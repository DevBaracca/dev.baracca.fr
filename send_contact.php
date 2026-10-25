<?php
/**
 * Baracca - Traitement du formulaire de contact
 * Anti-spam : honeypot + vérification temporelle + validation des champs
 */

// Rediriger si accès direct (pas en POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// ============================================
// 1. Honeypot anti-spam : si le champ caché "website" est rempli, c'est un robot
// ============================================
if (!empty($_POST['website'])) {
    header('Location: contact.php?contact=spam');
    exit;
}

// ============================================
// 2. Vérification temporelle (optionnelle si JS a tourné)
// ============================================
$formTimestamp = isset($_POST['form_timestamp']) ? (int) $_POST['form_timestamp'] : 0;
if ($formTimestamp > 0) {
    $elapsed = time() - $formTimestamp;
    if ($elapsed < 3) {
        // Soumission trop rapide = robot probable
        header('Location: contact.php?contact=spam');
        exit;
    }
}

// ============================================
// 3. Récupération et nettoyage des données
// ============================================
$nom     = isset($_POST['nom'])     ? trim(htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'))     : '';
$prenom  = isset($_POST['prenom'])  ? trim(htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8'))  : '';
$email   = isset($_POST['email'])   ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL))      : '';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8')) : '';
$rgpd    = isset($_POST['rgpd'])    ? true : false;

// ============================================
// 4. Validation des champs obligatoires
// ============================================
$errors = [];

if (empty($nom))     $errors[] = 'nom';
if (empty($prenom))  $errors[] = 'prenom';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'email';
if (empty($message)) $errors[] = 'message';
if (!$rgpd)          $errors[] = 'rgpd';

if (!empty($errors)) {
    header('Location: contact.php?contact=invalid');
    exit;
}

// ============================================
// 5. Construction et envoi de l'e-mail
// ============================================
$to      = 'invest@baracca.fr';
$subject = '[Baracca] Nouveau message de contact - ' . $prenom . ' ' . $nom;

$body = "Nouveau message reçu via le formulaire de contact du site Baracca.\n\n";
$body .= "----------------------------------------\n";
$body .= "Nom     : " . $nom . "\n";
$body .= "Prénom  : " . $prenom . "\n";
$body .= "E-mail  : " . $email . "\n";
$body .= "----------------------------------------\n\n";
$body .= "Message :\n" . $message . "\n";
$body .= "----------------------------------------\n";
$body .= "Envoyé le " . date('d/m/Y à H:i:s') . "\n";

$headers  = "From: Baracca Contact <no-reply@baracca.fr>\r\n";
$headers .= "Reply-To: " . $prenom . " " . $nom . " <" . $email . ">\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoi de l'e-mail
$success = mail($to, $subject, $body, $headers);

// ============================================
// 6. Redirection avec résultat
// ============================================
if ($success) {
    header('Location: contact.php?contact=success');
} else {
    header('Location: contact.php?contact=error');
}
exit;
