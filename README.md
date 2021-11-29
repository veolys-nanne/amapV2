# amapV2

## Pré-requis

- docker version 19.03.8 ou supérieure
- docker-compose version 1.25.0 ou supérieure

## Installation

- récupérer le projet : "git clone git@github.com:veolys-nanne/amapV2.git"
- aller dans le répertoire créé : "cd amapV2"
- lancer la commande d'installation : "make install"

## URL

- accueil Symfony : http://127.0.0.1:8083/
- documentation API : http://127.0.0.1:8083/api/docs
- phpMyAdmin : http://127.0.0.1:8084/ (root sans mot de passe)
- MailDev : http://127.0.0.1:8085/

## Identification à l'API DOC

- se rendre sur la documentation API http://127.0.0.1:8083/api/docs
- aller dans la rubrique Token 'POST' '/api/login', bouton 'Try it out'
- saisir '{"email": "amaphommesdeterre@etre-enchante.org", "password": "#AmapHommesDeTerre14"}'
- cliquer sur la bouton 'execute'
- copier la valeur du token (ex: 'eyJ0e...JLffg')
- cliquer sur la bouton en haut à droite 'Authorize'
- Entrer la valeur 'Bearer '+ token (ex: 'Bearer eyJ0e...JLffg') et valider