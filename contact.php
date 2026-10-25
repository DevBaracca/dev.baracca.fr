<?php include 'includes/head.html'; ?>

  <!-- Logo seul centré en gros -->
  <div class="main-logo-container">
    <img src="assets/images/logo-seul.png" alt="Baracca" class="main-logo">
  </div>

  <!-- Hero Section -->
  <section class="hero" style="min-height: 50vh;">
    <div class="container">
      <div class="hero-content fade-in">
        <h1>Contactez-nous</h1>
        <p class="hero-subtitle">Une question, un projet, une envie de nous rejoindre ? Écrivez-nous.</p>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="section section-green-light">
    <div class="container">
      <div class="contact-wrapper fade-in">

        <!-- Messages de feedback -->
        <?php if (isset($_GET['contact'])): ?>
          <div class="contact-message contact-message-<?php echo htmlspecialchars($_GET['contact']); ?>">
            <?php
              if ($_GET['contact'] == 'success') echo 'Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.';
              elseif ($_GET['contact'] == 'error') echo 'Une erreur est survenue. Veuillez réessayer.';
              elseif ($_GET['contact'] == 'spam') echo 'Votre message n\'a pas pu être envoyé. Veuillez réessayer.';
              elseif ($_GET['contact'] == 'invalid') echo 'Veuillez remplir tous les champs obligatoires et accepter la politique de confidentialité.';
            ?>
          </div>
        <?php endif; ?>

        <form id="contact-form" class="contact-form" action="send_contact.php" method="post">
          <div class="form-row">
            <div class="form-group">
              <label for="nom">Nom <span class="required">*</span></label>
              <input type="text" id="nom" name="nom" required placeholder="Votre nom">
            </div>
            <div class="form-group">
              <label for="prenom">Prénom <span class="required">*</span></label>
              <input type="text" id="prenom" name="prenom" required placeholder="Votre prénom">
            </div>
          </div>

          <div class="form-group">
            <label for="email">Adresse e-mail <span class="required">*</span></label>
            <input type="email" id="email" name="email" required placeholder="votre@email.fr">
          </div>

          <div class="form-group">
            <label for="message">Message <span class="required">*</span></label>
            <textarea id="message" name="message" rows="6" required placeholder="Écrivez votre message ici..."></textarea>
          </div>

          <!-- Honeypot anti-spam : champ caché invisible pour les humains -->
          <div class="form-honeypot" aria-hidden="true">
            <label for="website">Ne pas remplir ce champ</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
          </div>

          <!-- Champ timestamp anti-spam (rempli par JS au chargement) -->
          <input type="hidden" name="form_timestamp" id="form_timestamp" value="">

          <div class="form-group form-checkbox">
            <label class="checkbox-label">
              <input type="checkbox" id="rgpd" name="rgpd" required>
              <span class="checkmark"></span>
              <span class="checkbox-text">J'accepte que mes données soient traitées conformément à la <a href="politique-confidentialite.php" target="_blank">politique de confidentialité</a> de Baracca. <span class="required">*</span></span>
            </label>
          </div>

          <div class="form-group form-submit">
            <button type="submit" class="btn-cta btn-large" id="contact-submit">Envoyer le message</button>
          </div>
        </form>

      </div>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
