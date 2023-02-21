Le squelette de l'application a été crée grâce au tutoriel suivant :
https://www.youtube.com/playlist?list=PLfdtiltiRHWGXVHXX09fxXDi-DqInchFD

Il comporte quelques modifications pour corriger certaines erreurs que j'ai rencontré.
Ce squelette me servira de base pour mes prochains (petits) projets MVC.

Il est impératif d'implémenter des mesures de sécurité, ceci n'est qu'un squelette de base.


A FAIRE: Ré-organiser $_SESSION['panier'] lors du traîtement car si quelqu'un ajoute 2 fois le même produit,
certes il ne s'ajoute pas mais un index est crée. Cela cause ensuite un probleme lors de l'affichage dans panier/s