# apoteka
custom php oop project             


UVOD

	Tema projekta predstavlja simulaciju web aplikacije jedne apoteka. Ona se sastoji iz više celina koji mogu biti od koristi klijentima, kao i vlasnicima apoteke. Pored ostalog, aplikacija sadrži e-shop, blog i druge korisne informacije koje mogu biti od važnosti potencijalnim kupcima, dok sa druge strane zaposlenima omogucava da preko nje vrše upload proizvoda, tekstova, korisnih saveta, prate kretanje pošiljki kao i druge stvari. Takode, na samom pocetku treba istaci da je rad pretežno raden u PHPu kao i da je korišcen patern MVC o cemu ce svakako biti više reci kasnije.


KORISNICKI DEO


U ovom delu rada bice prezentovan korisnicki deo web aplikacije, odnosno njen izgled i funkcionalnosti. Prvo ce biti predstavljen deo koji mogu da vide klijenti a zatim i administratorski deo koji je obezbeden samo sa privilegovane korisnike odnosno admine.


Pošetna strana – Home

Na pocetnoj strane korisnik može da vidi pre svega neke od najvašnijih stavki kao što su linkovi, navigacija, proizvodi na akciji i slicno. Konkretno, na samom vrhu se nalazi navigacija koja mu omogucava da se krede kroz sve stranice na sajtu. Takode, ta navigacija se nalazi i na svakoj drugoj strani tako da je „orjentacija u prostoru“ veoma olakšana. Na pocetnoj strani se takode nalazi i odeljak proizvoda na akciji pod nazivom „iz ponude izdvajamo“. Ovde treba istaci da svi proizvodi koji se nalaze u navedenom odeljku, dinamicki se ispisuju. Zaposleni kroz administratorski deo aplikacije može da vec postojece proizvode stavi na akciju tako što ce ih odabrati i dodati procenat za koji se cena umanjuje (o ovome ce biti više reci kasnije). Recimo, stara cena koja je precrtana se dinamicki štampa iz baze zajedno sa novom cenom.
Konacno, na samom kraju nalazi se i link koji vodi korisnika do stranice na kojoj se nalaze svi proizvodi, kao i još neke potencijalno korisne informacije...

Strana About_us

Na strani o nama (about_us) potencijalni vlasnici mogu da postave tekst koji bi pružao korisne informacije o samoj apoteci. U ovom radu na pomenutoj strani nalazi se Lorem ipsum koji simulira taj tekst. U eventualnoj produkciji lako bi se došlo do korekcije.

Strana Products

Strana products predstavlja okosnicu e-shopa ove web aplikacije. Na njoj korisnik može da se upozna sa svim proizvodima, odnosno lekovima koji se nalaze u ponudi. Takode, korisnik može da vrši pretragu po odredenim kriterijumima kao bi što lakše došao do željenog proizvoda.
Konkretno, korisniku su na raspolaganju cetiri vrste pretrage: po nazivu, proizvodacu, ATC klasifikaciji i siptomima.
Pretraga na osnovu naziva funkcioniše tako što korisnik u input polje predvideno za to unese naziv (odnosno bilo koji niz karaktera), a sama aplikaciju ma vraca proizvod/e koji sadrže traženu rec. Ukoliko korisnik ukuca svega jedno slovo, na pirmer slovo a, kao rezultat dobice sve proizvode koji u svom nazivu sadrže slovo a.
Ukoliko to korisnik želi, može da vrši pretragu i putem proizvodaca. U tom slucaju korisniku su ponudeni svi proizvodaci koji se nalaze u bazi. Konacno odabirom jednog od njih korisnik dobija sve lekove koji se nalaze u ponudi a od tog su proizvodaca.
Slicno funkcioniše i pretraga po ATC klasifikaciji. Korisnik isto bira jednu od ponudenih stavki a na osnovu nje vracaju mu se svi proizvodi koji su podvedeni pod nju. Inace, treba istaci da je ATC klasifikacija medunarodna podela lekova i drugih preparata na osnovu koje se vrši razvrstavanje lekova. Takode, ta klasifikacija je koncna, odnosno admin je ne može dopunjavati dok proizvodace može.
Konacno, korisnik može vršiti pretragu i po simptomima. Za razliku od pretrage po proizvodacu i ATC klasifikaciji, gde korisnik bira svega jednu od ponudenih kriterijuma, pretraga po simptomu omogucava biranje više simptoma. Ti rezultati se zatim prezentuju na nacin da se lek koji ima najviše podudaranja, odnosno koji ima najviše simptoma, postavlja napred, a zatim oni sa manje i na kraju oni sa po jednim simptomom.
Svaki put kada korisnik izvrši pretragu dolazi na stranicu searched_products. U zavisnosti od osnova pretrage dalje se gradi URL.
Na slici se može videti trenutni URL stranice, te da se korisnik trenutno nalazi na strani products/searched_products/mucnina_povracanje_glavobolja. Drugim recima, korisnik je na strani products izvršio pretragu po simptomima, a kao odabrane simptome naveo je mucnina, povracanje i glavobolje. Kao rezultat dobio je cetiri proizvoda od kojih prvi ima dva poklapajuca siptoma, dok ostali svega po jedan.
Svaki od lekova prezentovan na strani products (sa manjim izmenama i proizvodi na akciji), nalaze se u boksu i svaki od njih sadrži lik tj dugme koje korisnika vode do detalja o željenom leku. Klikom se dalje otvara strana selected_product koja sadrži podrobnije podatke o traženom leku. Kao i u slucaju pretrage proizvoda, URL se dinamicki generiše tako da nakon odlaska na navedenu stranu nakon kose crte dolazi naziv leka ciji se detalji prezentuju. Prostije receno dinamicki se gradi URL tako da ukoliko je izabran lek brufen, na primer, URL izgleda /products/selected_product/brufen. 

Strana Avices

Pored e-shopa web aplikacija apoteke sadrži i blog odnosno odeljak sa savetima iz oblasti farmacije. Na strani advices korisnik može da pronade sve savete koji su postavljeni za citanje(Postoji mogucnost i postavljanja teksta u bazu ali koji nece biti postavljen za citanje). Svaki od izlistanih tekstova predstavljen je naslovom, slicicom, kratkim opisom, datumom pisanja i autorom. Klikom na naslov teksta korisnik može da otvori pojedinacni tekst i tada ce moci da procita tekst u celini. Slicno kao i u sliucaju proizvoda, URL se dinamicki gradi, tako da korisnik otvaranjem pojedinacnog teksta ustvari odlazi na stranicu advices/single_advice/Naslov_izabranog_teksta.

Strana Contact

Na ovoj strani se nalaze osnovni podaci koji su potrebni kako bi korisnik mogao da stupi u kontakt za zaposlenima u apoteci. Imajuci u vidu karakter ovog rada, trenutno se na ovoj strani nalaze neki fiktivni podaci koji simuliraju odgovarajuce podatke.

Strane Cart i Login

Ukoliko korisnik klikom na ikonicu korpe pokuša da ude na stranu cart, a pritom nije registrova biva redirektovan na stranu za registraciju. Ovde dolazimo do prve velike rezlike u ovlašcenjima izmedu korisnika i registrovanog korisnika. Dolaskon na stranu registracije korisnik može izvršiti login ukoliko vec poseduje odgovarajuce odobrenje, ili se po prviput registrovati (i poslati zahtev adminu na odobrenje). Ukoliko je login uspešan, odnosno ukoliko se sifra i korisnicko ime poklope sa onim u bazi registrovan korisnik zapocinje svoju sesiju. U ovom momentu se web aplikacija razlikuje u odnosu na registrovanog korisnika. Pre svega, korisnik može da poseti svoj profil na kome se nalaze njegovi osnovni podaci. Takode tu se nalaze i sve njegove porudžbine razvrstane po fazi u kojoj se nalaze. O ovome ce biti više reci nešto kasnije. Vratimo se na kratko na stranu registracija. Na njoj se može, kao što je receno, izvršiti login ali se može i napraviti novi nalog. Registracija novog korisnika može biti dvojaka, odnosno može se registrovati kao fizilko lice ili kao pravno lice, i u zavisnosti od toga popunjavace se razlicite forme. Takode, ukoliko je korisnik vec ulogovan, umesto login forme stajace dugme za logout.
Još jedna razlika u registrovanog (tacnije ulogovanog) korisnika i obicnog posetioca je vezana za proizvode. Svaki boks koji sadrži proizvod pored stavki koje je i do tad imao, dobija i dugme za kupovinu. Pored njega se nalazi input za kolicinu na osnovu koje registrovani korisnik može da doda željeni proizvod i njegovu kolicinu u korpu. Klikom na ovo dugme registrovani korisnik nije redirektovan na bilo koju stranu vec ostaje na istoj i dodavati koliko god želi proizvoda. U svakom trenutku registrovani korisnik može otici na stranicu chart gde može proveriti stanje u korpi. Pored naziva svakog leka odnosno proizvoda koji se nalazi u korpi nalazi se i input polje koje pokazuje kolicinu. Preko istog tog polja moguce je u samoj korpi menjati kolicinu, odnosno dodavati ili smanjivati. Moguce je i da korisnik izbaci odredeni proizvod iz korpe klikom na crveno dugme otkaži. Menjanjem kolicine, kao i otkazivanjem odredenog leka, dinamicki se menja ukupna suma odnosno cena. Ona se sastoji iz cene proizvoda puta njegova kolicina, plus cena poštarine koja se dinamicki dovlaci iz baze i vezana je za grad u kome je registrovan korisnik. Konacno na samom kraju „korpe“ nalazi se dugme na koje se vrši kupovina. Klikom na njega registrovanom korisniku izlazi popup koji sumira sve proizvode, kolicine i ukupnu cenu i ukoliko korisnik klikne na dugme ok obavljena je kupovina. Na ovom mestu vratimo se na profil registrovanog korisnika. Kao što je receno postoje cetiri faze ili stanja u kojima se nalazi porudžbina. Prva je kada se izvrši narudžbina a što je predhodno bilo opisano. Drugo stanje je kada administratori narudžbinu pošalju putem pouzeca. Trece stanje je preuzimanje lekova i placanje (zamišljeno je da se placanje vrši prilikom preuzimanja). Poslednja faza ili stanje je otkazivanje porudžbine i ono se može desiti u jednoj od prve dve faze.



ADMINISTRATORSKI DEO



U ovom delu rada bice ukratko objašnjene mogucnosti koje imaju administratori odnosno zaposleni sa admin kredencijalima. Ukoliko se zaposlni na strani registration u formi login uloguje sa administratorskom šifrom i korinickim imenom otvara mu se poseban odeljak aplikacije koje bez pomenute šifre i korisnickog imena nisu dostupne. Odatle admin ima mogucnost da utice na proizvode, porudžbine, tekstove (savete), registrovane korisnike i zaposlene.

Strana Admin/products

Na ovoj strani administrator ima mogucnost da pre svega dodaje nove proizvode. U tom slucaju mora da popuni formu koja ima polja kao što su ime, cenu, opis, stanje, da izabere da li je u ponudi, proizvodaca, ATC (sve navedeno je obavezno), kao i da doda sliku ili simptom (nije obavezno).
Admin takode može da menja vec unete proizvode. Tehnicki ima mogucnost da promeni svaki atribut od imena do slike. 
Na ovoj strani admin može da doda i novog proizvodaca. Treba istaci da ukoliko admin treba da upiše novi proizvod sa novim proizvodacem prvo mora da doda proizvodaca pa tek zatim proizvod jer se select input puni dinamicki sa spiska proizvodaca.
Slicno je i za simptom. Administrator na ovoj strani takode dodaje novi simptom koji se posle može dodati bilo kom proizvodu.
Konacno na ovoj strani admin takode utice i na proizvode koji su na akciji. Ukoliko želi da neki od proizvoda stavi na akciju, admin ga jednostavno selektuje i odredi procenat za koji ce postojeca cena biti umanjena. Sa druge strane, jednostavnim štikliranjem admin skida proizvod sa liste akcija.

Strana admin/users

Ovde admin rešava pitanja korisnika. Odavde može da pristupi bilo kom od korisnika pojedinacno, bilo da je fizicko ili pravno lice. Odabirom u select inputu fizickih odnosno pravnih lica admin klikom na dugme vidi detalje odlazi na profil korisnika. Na strani admin/single_user se nalaze osnovni podaci korisnika kao i sve njegove porudžbine podeljene na vec navedene cetiri faze.
Takode, na strani admin/users administrator može da odobri ili odbaci zahtev bilo kog novog korisnika. Ukoliko ga prihvati admin, korisniku postaju akreditovane sifra i korisnicko ime i može poceti sa porudžbinama.

Strana admin/purchase

Svaka faza odnosno stanje svake porudžbine mora biti propracenno od strane administratora. Na ovoj strani admin radi upravo to. Porudžbine podeljene u sve cetiri faze sa potrebnim podacima predstavljene su adminu i on može u prve dve faze odlucivati šta ce biti sa njima. U prvoj fazi moguce je poslati porudžbinu putem kurirske službe ili je odbaciti, dok je u drugoj moguce konstatovati da je porudžbina preuzeta i placena ili odbijena. Naravno, imajuci u vidu svrhu ovog rada navedene radnje su pre svega hipoteticke.

Strana admin/advices

Na ovoj strani administrator ureduje deo aplikacije koji utice na savete odnosno blog. Pre svega admin može dodati novi tekst. On to može uciniti popunjavanjem forme koja od njega zahteva da unese naslov, opis teksta, sam tekst, sliku i odredenje da li je tekst aktivan ili ne.
 
Forma za dodavanje novog saveta (blog)

Hteo bih ovde da istaknem da se ubacivanje teksta vrši tako što se u polje tekst izvrši upload teksta koji se zatim u fajsistemu otvori, pokupe podaci i snime u bazu, dok se sam fajl zatvara i ne snima se nigde u aplikaciji. 
Slicna situacija je i sa izmenama postojecih tekstova. Admin može da promeni bilo koje svojstvo teksta. 
Na kraju admin koji je uplodovao tekst dinamicki se potpisuje ako autor teksta.

Strana admin/employees

Konacno na strani admin/employees administrator može da dodaje novog zaposlenog na listu zaposlenih u apoteci.
Takode, admin može i bilo kom vec zaposlenom dodeliti administratorsku šifru i korisnicko ime cime ce i on moci da vrši administratorski deo posla.


IMPLEMENTACIONI DEO



Web aplikacija apoteke je uradena u objektno orjentisanom programiranju, koristeci se MVC paternom. Osnovni jezik koji je korišcen je PHP, a pored njega koriceni su još i HTML, CSS, JavaScript, SQL, BOOTSTRAP i JQuery.

Struktura fajlova i MVC

Kao što je navedeno aplikacija je radena po MVC paternu. Imajuci u vidu njegovo znacenje (Model, View, Controller) logika aplikacije i sama struktura fajlova prilagodeni su ovom obrascu. 
Model odnosno modeli zaduženi su za pribavljanje podataka bilo kroz bazu bilo kroz rad sa file sistemom. U slucaju ove aplikacije modeli su bili zaduženi za komunikaciju sa SQL bazom. 
View je u okviru ovg paterna zadužen za štampanje odnosno prikaz samih stranica.
Controller je u samoj suštini logika same aplikacije. Ona komunicira sa modelom od kojed dobija odgovarajuce podatke, koje zatim obraduje i prosleduje u view koji ih zatim prikazuje na odgovarajucim mestima.
Imajuci ovo na umu, nužnost je bila izrada i odgovarajuce strukture fajlova. U svakom od foldera se nalaze iskljucivo fajlovi koji su neophodni za izvršavanje specificnih zadataka.

 
Struktura modela

Model sadrži ukupno 6 fajlova. Osnovni DB.php i još 5 modela odnosno klasa koji ga ekstenduju o cemu ce biti više reci. Svaki od ovih fajlova zadužen je za jedan deo baze bez obzira što ona sadrži cak 20 tabela. Modeli su napravaljeni tako da grupišu podatke iz srodnih tabela.
 
 
Struktura viewa 


U folderu View nalazi se ukupno 12 fajlova i jos dva foldera (includes i admin). U folderu admin nalazi se 6 fajlova, a svaki od njih predstavlja po jedan view u ovom slucaju za administratorski deo, a zajedno sa 12 view-ova koji služe za ostatak aplikacije, ukupno ima 18 razlicitih view-ova. U folderu includes nalaze se header i footer, kako regularni, tako i admin. 
Forlder controller sadrži 9 fajlova i folder lib. Fajl BaseController.php sadrži osnovni klasu BaseController koga naknadno proširuju ostalih 8 klasa. U lib se nalaze još tri fajla koji u suštini predstavljaju pomocne klase.
 
Struktura controllera

Konacno, u folderu assets se nalaze fajlovi koji su na ovaj ili onaj nacin neophodni za fukcionalnost aplikacije. Tu se nalazi folder css i u njemu fajl main.css koji ureduje stil aplikacije. U folderu img se nalaze slike koje su potrebne a mogu se odnositi na samu aplikaciju, proizvode, zaposlene, kompanije ili savete što struktura foldera dalje prati.
 
Struktura foldera assets

Na kraju tu se nalazi i folder js u kome se nalazi fajl main.js koji se odnosi na JacaScript.

Baza

Baza je radena u MySQL i sastoji se od 20 tabela medusobno povezanih odgovarajucim vezama. Svaka tabela sadrži podatke koji su jedinstveni odnosno ne ponavljaju se, takode svako polje u svakoj tabeli mora da bude popunjeno. Jedan od razloga za ovako složenu bazu jeste cinjenica da klijenti mogu da budu fizicko ili pravno lice, dok sa druge strane svako fizicko lice (person) ne mora da bude klijent, a isto važi i za pravno, jer kompanija može da bude klijent ali i proizvodac. Iz navedenih razloga neke tabele iako su slicne morale su da budu odvojene a samim tim celokupna baza je rasla.


PHP kod
Kao što je vec pomenuto, najveci deo aplikacije apoteka raden je u PHPu koristeci se principima Objektno Orjentisanog Programiranja. Napravljen je veliki broj klasa koje poboljšavaju funkcionalnost aplikacije i sada cemo detaljije videti neke od njih.

Klase
Klasa DB je osnovna klasa u okviru Modela. Svaki drugi model u ovoj aplikaciji ekstenduje ovu klasu. Klasa DB sadrži staticne metode getInstance(), executeSQL(), getData() i __construct(). U metodi getInstance() se proverava da li je uspostavljena konekcija sa bazom. Ukoliko jeste konekcija se dodelju promenjivoj conn i zatim se koristi u narednim dve metodama. Ukoliko pak konekcija nije uspostavljena, metoda instancira samu klasu (self) i na taj nacin omogucava konekciju. Zapravo, sama konekcija se nalazi u metodi __construct() koja se izvršava svaki put kada se ova klasa inicira. Na ovaj nacin omogucava se da se konekcija uspostavi jednom i da se koristi sve dok je otvorena. Metoda executeSQL() u suštini koristeci promenjivu conn u kojoj se zapravo nalazi konekcija izvršava kveri koji joj se prosledi. Kao rezultat vraca poslednji uneti id. Metoda getData() sa druge strane takode izvršava unete kverije ali kao rezultat vraca podatke koji pokupi u bazi.
 
Primer upotrebe metoda getData() i executeSQL()

Na ovom primeru možemo videti kako se metode getData() i executeSQL() koriste u klasi ProductsData. Naime, ProductsData ekstenduje klasu DB i na taj nacin može da koristi njene metode kao svoje deklarisanjem self::pa_naziv_metode. U navedenom primeru metoda getSymptoms(), koja se nalasi u klasi ProductsData koristi svoju metodu (tacnije metodu odredenu u klasi DB) kako bi dobila podatke iz tabele syimptoms. Sa druge strane, u metodi addNewSxmptom() koristi se metoda executeSQL() kako bi se izvršio navedeni sql kveri, odnosno da bi se izvršio upis podataka u tabelu symptoms.
Još jedna jako važna klasa jeste BaseController. Ova klasa služi kao osnovna klasa za svaki controller jer je oni ekstenduju. Ona sadrži metode koje se pojavljuju u nekoliko klasa a pre svega metodu show_view, a koja poziva odgovarajuci view. Tako naprimer, kada klasa Home treba da pozove view home.php kako bi ga prikazala, ona u suštini poziva metodu show_view koja je definisana u BaseController. Ovo je naravno moguce samo zato što klasa Home ekstenduje klasu BaseController.
U ovoj klasi treba pomenuti i metodu redirect_unathorized() pomocu koje se proverava da li korisnik sme da bude u odredenom delu sajta. Ona kao ulazne parametre prima osnov po kome ce se vršiti provera kao i lokaciju na koju ce korisnik biti poslat ako ne ispuni traženi uslov.
 
Klasa BaseController

Treba istaci da pored klasa koje ekstenduju DB u okviru modela i klasa koje ekstenduju BaseController u aplikaciji postoje još 3 pomocne klase. One su AdvicesProcess, ProductsProcess i EmployeesProcess i smeštene su u foderu lib u okviru kontrolera. U suštini one su pomoce klase cije metode koriste pre svega klase u okviru controllera kako bi se neke nužne radnje pomerile iz samih kontrolera a opet bile dostupne.
 
Klasa ProductsProcess

Klasa ProductsProcess obavlja radnje vezane za proizvode u najširem smislu, kako bi u samoj klasi Products ostalo što manje stvri koji narušavaju osnovnu strukturu klase. Na primer, metoda uploadingImgProduct() koristi se prilikom unosa novog ili izmena postojeceg proizvoda. Ona proverava samo da li je kroz file polje u formi uopšte izvršen upload bilo kakvog fajla,ako jeste da li je on odgovarajuci te ga snima u odgovarajuci folder a u bazu dodaje novi id koji se posle dodelju samom proizvodu kroz odgovarajuci kveri, ili ako nije izvršen onda se po automatizmz dodeljuje difoltna slika odnosno id iz tabele img. Sve ovo je moglo da se uradi i u metodi koja upisuje ili menja proizvod ali elegantnije rešenje je bilo da se ova radnja izdvoji u posebnu metodu u okviru pomocne klase.

Stilovi i skripte

Imajui u vidu prirodu ovog projekta odnosno da je naglasak pre svega bio na backendu, može se reci da su stilovi i skripte na skromnom nivou. Frontend se pre svega oslanja na Bootstrap i njegove klase, a koji se opet oslanja na JQuery biblioteku. Sajt je responzivan zahvaljujui Bootstrapovom sistemu kolona. Sa druge strane, sav stil koji je dodavan dolazi iz fajla main.css. U ovom fajlu se nalazi sav stil koji je neophodan kako bi se postigao zadovoljavajuci izgled kao i kod koji „gazi“ odnosno prepravlja difoltnu stilizaciju koja proizilazi iz Bootstrapa.
Što se tice JavaScripta, on je pre svega korišcen kako bi se povecala dinamika same aplikacije. Tu se u prvom redu misli na nacin na koji registrovani korisnik može da klikom na dugme dodaj u korpu bez redirektovanja nastavi da kupuje. Ovo je postignuto korišenjem sessionStorage. Naime, svakim klikom se podaci iz PHP šalju u JavaScript i cuvaju u sessionStorage, da bi na kraju klikom na dugme kupi izabrane lekove i potvrdom na popup-u, svi podaci vratili u PHP i zatim upisali u bazu. Takode u vezi sa tim, JavaScriptom je omoguceno da se automtski i dinamicki menja ukupna cena u korpi.
