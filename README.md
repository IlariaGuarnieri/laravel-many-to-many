continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e(clonare la vecchia repo, rinominare la cartella generata con ‘laravel-many-to-many’, eliminare la cartellina .git e inizializzare la nuova repo), se non è stato ancora fatto, aggiungiamo una nuova entità **Technology**. Questa entità rappresenta le tecnologie utilizzate ed è in relazione **many to many** con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare la migration per la tabella `technologies` ok
- creare il model `Technology` ok
- creare la migration per la tabella pivot `project_technology` ok
- aggiungere ai model Technology e Project i metodi per definire la relazione many to many ok
- visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
- permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione
Bonus:
creare il seeder per la tabella pivot
