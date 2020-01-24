<h1> Bienvennue sur le site web de l'Hotel Transylvania </h1>

<p> Bonjour à vous et merci de venir visiter notre site web en exclusivité. </br> Ceci veut dire que le site n'étant pas héberger il va vous falloir faire quelques configuration</p>
<h2>Installation du site web
    Laravel </h2>
<p>
Vous avez du recevoir un script config.sh. Il vous faudra l'executer dans un dossier créer par vos soins ou sera votre machine virtuelle/serveur.
Ce script est en deux partie et automatisera la plupart des commandes mais il vous faudrat tout de même en faire quelques unes(maudites vagrant provision !!!!). Une fois dans votre machine virtuel faites
    
        cd /var/www/html
        bash /var/www/html/install-packages.sh

</p>

<h2>Utilisation du site </h2>
<p> Pour utiliser le site et voir ces fonctionnalitées il faut se log avec les différents type d'utilisateurs : des clients le proprio ou le personnel . Le mdp de login de chacun est 'password' par contre les e-mail de login étant randomisés au seeding il vous faudrat aller les chercher dans votre db avec mysqlworkbench 
    Les différentes fonctionnalité:
    le client peut une fois logger reserver une chambre, et édit ou delete son profil ainsi que delete ses reservations
    le personnel a accés a une liste des clients
    et le proprio et le manager peuvent edit delete et create des utilisateur ou des chambres.
    il y  a un accès à une boutique mais le panier ne marche pas ... 
    ah oui il y a une petite API pour la météo sur l'index
<h2>Bug et correctif</h2>
<p>Il n'y a presque pas de securité sur la protection des routes et pas de  validators .... le but étant d'avoir une démo fonctionnelle 
Le panier ne marche pas ... En effet au premier clique sur l'item ca crée bien dans le panier mais aprés un rechargement de la page il faut que lorsque l'utilisateur clique cela update le panier et non en crée un nouveau.
Dernier petit bug au niveau du script  il aura peut etre à lancer php artisan migrate et php artisan db:seed</p> 
