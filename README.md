sercizio di oggi: Laravel Boolfolio - Project Typology
nome repo: laravel-one-to-many
Ciao ragazzi/e,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo aggiungendo la relazione one to many fra i progetti e i type.
Il mio consiglio è di clonare la vecchia repo, rinominare la cartella generata con ‘laravel-one-to-many’, eliminare la cartellina .git e inizializzare la nuova repo. (Ricordatevi di ricreare il link simbolico dello storage)

//db:seed refresha l'intestail contenuto della tabella
1. php artisan make:migration update_projects_table --table=projects 
2. lavoro nella migration creata
