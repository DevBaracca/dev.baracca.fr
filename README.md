# Baracca - Landing Page

Landing page moderne et responsive pour Baracca - L'habitat mobile, biosourcé et réversible.

## Structure du projet

```
dev.baracca.fr/
├── index.html              # Page d'accueil principale
├── README.md               # Documentation
├── assets/
│   ├── css/
│   │   └── style.css       # Styles principaux
│   ├── js/
│   │   └── script.js       # Scripts JavaScript
│   └── images/
│       ├── logo-baracca-bandeau.png
│       ├── favicon.png
│       └── Image3_000.png
```

## Fonctionnalités

### Design
- Design moderne et épuré avec palette de couleurs verte (biosourcé)
- Typographie Inter (Google Fonts) pour une lecture optimale
- Animations fluides et transitions
- Design entièrement responsive (mobile-first)

### Sections de la landing page
1. **Header** : Navigation sticky avec menu mobile
2. **Hero** : Bannière d'accueil avec call-to-action
3. **Le Projet** : Présentation des modules Baracca
4. **Avantages** : 6 bénéfices clés avec icônes
5. **Analyse Cadastrale** : Présentation de la technologie d'analyse
6. **Chiffres Clés** : Statistiques animées
7. **Témoignages** : Avis clients et partenaires
8. **CTA Final** : Appel à l'investissement
9. **Footer** : Liens utiles et réseaux sociaux

### Fonctionnalités JavaScript
- Compteurs animés (chiffres clés)
- Animations au scroll (fade-in)
- Menu mobile responsive
- Navigation fluide avec défilement
- Surbrillance de la section active dans la navigation
- Gestion des hash dans l'URL
- Année dynamique dans le footer
- Parallax optionnel sur l'image du hero

## Technologie d'analyse cadastrale

La landing page met en avant la capacité de Baracca à analyser les données cadastrales :
- Résolution des codes postaux via geo.api.gouv.fr
- Téléchargement des données cadastrales (parcelles, bâtiments) depuis Etalab
- Croisement avec les Demandes de Valeurs Foncières (DVF) pour les prix au m²
- Génération de rapports détaillés avec statistiques, histogrammes et cartes interactives

## Personnalisation

### Modification du contenu
- Editez `index.html` pour modifier le texte et la structure
- Mettez à jour les valeurs des compteurs dans les attributs `data-target`
- Remplacez les images dans `assets/images/`

### Modification du design
- Editez `assets/css/style.css` pour modifier les couleurs, polices, etc.
- Les variables CSS sont définies en haut du fichier pour une personnalisation facile

### Modification des scripts
- Editez `assets/js/script.js` pour ajouter ou modifier les fonctionnalités

## Déploiement

### Pré-requis
- Aucun, c'est un site statique

### Déploiement local
Ouvrez simplement `index.html` dans un navigateur.

### Déploiement sur un serveur
Copiez le dossier `dev.baracca.fr` sur votre serveur web. Assurez-vous que :
- Le serveur sert les fichiers avec le bon type MIME
- Les liens sont correctement configurés

### Déploiement avec Netlify
1. Créez un nouveau site sur Netlify
2. Connectez votre dépôt Git
3. Configurez le dossier de publication comme `dev.baracca.fr`
4. Déployez !

## Couleurs principales

| Couleur | Code | Usage |
|---------|------|-------|
| Vert principal | #4A9B8E | Boutons, accents |
| Vert foncé | #3A8B7E | Survol |
| Vert clair | #5CADA5 | Accents secondaires |
| Noir | #1A1A1A | Texte principal |
| Gris | #6B7280 | Texte secondaire |
| Blanc | #FFFFFF | Fond |

## Typographie

- **Famille** : Inter (Google Fonts)
- **Poids** : 400, 500, 600, 700, 800
- **Taille** : Responsive (adaptée à tous les écrans)

## Adaptation mobile

La landing page est entièrement responsive et s'adapte à :
- Desktop (large écran)
- Tablette
- Mobile (portrait et landscape)

## Crédits

- Design inspiré du site existant Baracca
- Icônes : Feathers Icons (SVG inline)
- Polices : Google Fonts (Inter)
- Développé avec passion pour la transition écologique de l'habitat

## License

Propriétaire - Baracca 2024-2025
