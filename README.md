# IOT
In dit project word een iot device gebruikt om temperatuur en humitity te meten en dit op een wepsite te tonen.
Om data in de data bank te steken word er een pythoin scrip op de resbazrypi gebruikt.https://github.com/toonst5/IOT/blob/main/tempNhum.py
Dit stuurt zijn data via een POST naar de request page.https://github.com/toonst5/IOT/blob/main/taak/request.php
Deze page gebruikt MYSQL om naar de data base de waardes door te geven.
De data base bestaat uit twee tabbelen.
De eerste houde de sensoren bij.(id/ name/ ip/ time stamp)
De twede houd de waardes van de sensoren bij.(Sensor of id/ waarde/ time stamp)
Deze zijn automaties gelinked.
De main wepsait word gebruikt om alle data te tonen. http://www.student.pxl-ea-ict.be/11902966/taak/main.html
Op de main wepsite kan er ook een POST gebruik worden om hantmatig date in de data base te steken.
Deze stuurt opniew naar de request page.
Om de date te laten zien word er een tabel getoont en een grafiek.
Om de tabel te maken werd er ajax gebruikt om met de AJAX_DATA.php te comuniseren.https://github.com/toonst5/IOT/blob/main/taak/AJAX_DATA.php
Deze vraagt waardes aan de data base via MYSQL.
Voor de grafiek word via een iframe een andere wepsite getoont.
Deze wepsaait vraagt de data op via MYSQL en geeft deze door aan een API om de graphiek te maken.https://github.com/toonst5/IOT/blob/main/taak/steal.php
Er word ook nog opniew met eenn iframe naar een andere wepsite gegaan om met een api het locale weer op te vragen.
Deze wepsait stuurt naar de api Json code en de api stuurt de juiste code terug met een RSS feed.https://github.com/toonst5/IOT/blob/main/taak/api.php

![alt text](https://github.com/toonst5/IOT/blob/main/Schermafbeelding%202021-01-14%20202547.png)
