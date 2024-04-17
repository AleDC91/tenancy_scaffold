<?php

namespace Database\Seeders;

use App\Models\YearlyDeadline;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearlyDeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentYear = Carbon::now()->year;

        $yearlyDeadlines = [
            [
                'name' => "Versamento IVA e ritenute - Dicembre " . ($currentYear - 1),
                'description' => "I contribuenti mensili sono tenuti ad elaborare, entro il 16 di ogni mese, le liquidazioni IVA del mese precedente e a versare l'eventuale importo a debito. Stessa scadenza vale per i sostituti d'imposta che hanno effettuato la trattenuta alla fonte sulle fatture ricevute da professionisti, in fase di pagamento, e che devono versarla all’erario entro il 16 del mese successivo.",
                'date' => $currentYear . '-01-16',
            ],
            [
                'name' => 'Versamento 2° acconto' . ($currentYear - 1) . 'o unica soluz.',
                'description' => "Versamento 2° acconto " . ($currentYear - 1) . " o unica soluz. – REDDITI/IRAP PF con P. IVA e ricavi/compensi 2022 ≤ € 170.000 (no INPS)",
                'date' => $currentYear . '-01-16',
            ],
            [
                'name' => 'Mod. INTRA - Dicembre ' . ($currentYear - 1) . " e 4° trimestre " . ($currentYear - 1),
                'description' => "l'Intrastat è una dichiarazione relativa alle operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell'IVA e delle politiche commerciali. Le dichiarazioni INTRA devono essere presentate periodicamente all'Agenzia delle Dogane.",
                'date' => $currentYear . '-01-25',
            ],
            [
                'name' => 'Dichiarazione e liquidazione OSS - 4° trimestre' . ($currentYear - 1),
                'description' => "è una dichiarazione che semplifica le procedure IVA per le imprese che effettuano vendite a distanza di beni e servizi digitali ai consumatori finali all’interno dell’Unione Europea. Questa dichiarazione permette di gestire le obbligazioni IVA relative a più stati membri attraverso un unico portale, il Portale OSS, evitando così alle imprese di dover registrarsi per l’IVA in ciascuno stato membro in cui operano",
                'date' => $currentYear . '-01-31',
            ],
            [
                'name' => 'Comunicazione Tessera Sanitaria – Spese 2° semestre ' . ($currentYear - 1),
                'description' => 'Coloro che operano nel settore sanitario non inviano le fatture tramite SDI come avviene per le fatture elettroniche, ma sono tenuti ad una comunicazione periodica tramite un canale riservato. Questo sarà utile ai contribuenti, che si troveranno le spese mediche sostenute nel 730 precompilato.',
                'date' => $currentYear . '-01-31',
            ],


            //febbraio

            [
                'name' => 'Versamento IVA e ritenute – Gennaio',
                'description' => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-02-16',
            ],
            [
                'name' => 'Versamento INPS fissi e IVA 4° trim.' . ($currentYear - 1) . '(trimestrali speciali)',
                'description' => 'Il 16 febbraio scade anche l’IVA per i cosiddetti “trimestrali speciali”, cioè tipologie particolari di contribuenti (ad esempio distributori di carburanti, autotrasportatori, ecc) con saldo a debito per il quarto trimestre dell’anno precedente (gli altri la versano in sede di conguaglio annuale).',
                'date' => $currentYear . '-02-16',
            ],
            [
                'name' => 'Versamento saldo imposta sostitutiva rivalutazione TFR',
                'description' => 'sulle rivalutazioni dei fondi per il Trattamento di fine rapporto (Tfr) viene applicata un’imposta sostitutiva delle imposte sui redditi pari al 17%. Il pagamento di questa imposta è responsabilità del datore di lavoro o dell’ente pensionistico, il quale è tenuto a versarla in due momenti distinti: un acconto entro il 16 dicembre e il saldo da effettuarsi entro il 16 febbraio dell’anno seguente.',
                'date' => $currentYear . '-02-16',
            ],
            [
                'name' => "Versamento premio INAIL – regolazione " . ($currentYear - 1) . " e rata " . $currentYear,
                'description' => "è un adempimento annuale obbligatorio per i datori di lavoro soggetti all’assicurazione contro gli infortuni sul lavoro e le malattie professionali, inclusi gli artigiani senza dipendenti. Il premio di autoliquidazione è la somma dell’acconto e della regolazione, al netto di eventuali riduzioni contributive, e deve essere pagato tramite il modello F24.",
                'date' => $currentYear . '-02-16',
            ],

            [
                'name' => "Versamento Enasarco su provvigioni maturate 4° trim. " . ($currentYear - 1),
                'description' => " il contributo Enasarco (Ente nazionale di assistenza per gli agenti e i rappresentanti di commercio), calcolato sulle provvigioni viene suddiviso equamente il lavoratore e l’azienda : il 50% dell’importo, pari all’8,50%, è responsabilità dell’azienda, mentre l’altra metà è a carico del lavoratore.",
                'date' => $currentYear . '-02-20',
            ],
            [
                'name' => "Mod. INTRA – Gennaio",
                'description' => " dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-02-26',
            ],
            [
                'name' => "INPS regime contributivo agevolato per forfetari ART/COMM",
                'description' => " si tratta della scadenza per eseguire la richiesta di riduzione dei contributi INPS per i titolari di partita IVA in regime forfettario. Bisogna effettuare la comunicazione sul sito dell’INPS entro questa data per beneficiare dell’applicazione dell’aliquota ridotta.",
                'date' => $currentYear . '-02-28',
            ],
            [
                'name' => "Versamento imposta di bollo su FE – 4° trimestre " . ($currentYear - 1),
                'description' => "l’imposta di bollo sulle fatture elettroniche, relative ai primi, terzi e quarti trimestri dell’anno, deve essere versata entro il termine ultimo del secondo mese successivo a ciascun trimestre. Si applica sulle fatture o ricevute emesse in forma cartacea o elettronica di importo superiore ai 77,47 euro ma che non contengono IVA.",
                'date' => $currentYear . '-02-28',
            ],
            [
                'name' => "Comunicazione LIPE – 4° trimestre " . ($currentYear - 1) . " (Può essere inclusa nel mod. IVA " .  ($currentYear) . ")",
                'description' => " si tratta del Modello di comunicazione delle Liquidazioni Periodiche IVA (Li.pe.). Attraverso l’invio di questo documento, il contribuente comunica all’Agenzia delle Entrate i dati contabili relativi alle liquidazioni IVA periodiche svolte nel periodo di riferimento. Se si manda direttamente la Dichiarazione IVA comprensiva dei dati del quarto trimestre, è possibile evitare l’invio della LiPe.",
                'date' => $currentYear . '-02-28',
            ],
            [
                'name' => "Dichiarazione retribuzioni INAIL – anno " . ($currentYear - 1),
                'description' => " è necessario dichiarare l’effettivo ammontare delle retribuzioni corrisposte nell’anno precedente. È il datore di lavoro a dover eseguire questa dichiarazione.",
                'date' => $currentYear . '-02-28',
            ],

            //marzo
            [
                'name' => "Versamento saldo IVA annuale – " . ($currentYear - 1),
                'description' => "In merito al debito della Dichiarazione IVA dell’anno precedente, i contribuenti hanno la possibilità di effettuare il pagamento in un’unica soluzione o di rateizzarlo. Le rate, di importo uguale, devono iniziare dalla data stabilita per il pagamento unico e proseguire il 16 di ogni mese fino a un massimo di 10 rate (sulle rate successive alla prima viene applicato un interesse fisso di rateizzazione dello 0,33% mensile). È inoltre possibile differire il pagamento alla scadenza prevista per il versamento delle imposte sui redditi, ovvero il 30 giugno, applicando un interesse dello 0,40% per ogni mese o frazione di mese successivo al 16 marzo.",
                'date' => $currentYear . '-03-18',
            ],
            [
                'name' => "Invio mod. CU 2024 – anno " . ($currentYear - 1),
                'description' => "IL la Certificazione Unica (CU) è un documento fiscale fondamentale che attesta e certifica i redditi percepiti da dipendenti, lavoratori assimilati, autonomi e altri soggetti. Questo documento è essenziale per la dichiarazione dei redditi e include diverse categorie di entrate, quali stipendi da lavoro dipendente, provvigioni, compensi per lavoro autonomo, e altri tipi di redditi.",
                'date' => $currentYear . '-03-18',
            ],
            [
                'name' => "Versamento tassa annuale libri sociali – " . $currentYear,
                'description' => "È una tassa dovuta per la numerazione e bollatura dei libri e registri sociali indipendentemente dal loro numero. È totalmente deducibile dalle imposte sui redditi, sia IRES che IRAP.",
                'date' => $currentYear . '-03-18',
            ],
            [
                'name' => "Versamento IVA e ritenute – Febbraio",
                'description' => "Se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-03-18',
            ],
            [
                'name' => "Comunicazione Agenzia Entrate dati 730 precompilato",
                'description' => "(Ag. funebri, asili nido, amm. condominio, assicurazioni): per alcune tipologie di attività è fissata a marzo la scadenza della comunicazione all’Agenzia delle Entrate del 730 precompilato.",
                'date' => $currentYear . '-03-18',
            ],
            [
                'name' => "Opzione cessione credito/sconto in fattura spese " . ($currentYear - 1),
                'description' => "si tratta dell’invio delle comunicazioni di opzioni per la cessione del credito di imposta o per lo sconto in fattura inerenti a spese agevolate con Superbonus o bonus “ordinari” sostenute nel " . ($currentYear - 1) . ", o negli anni precedenti se si tratta di rate ancora non saldate.",
                'date' => $currentYear . '-03-18',
            ],
            [
                'name' => "Comunicazione spese al Sistema TS – anno " . ($currentYear - 1) . " (spese veterinarie)",
                "description" => "è necessario effettuare la trasmissione al Sistema Tessera Sanitaria dei dati delle spese veterinarie sostenute dalle persone fisiche nell’anno " . ($currentYear - 1) . " e ammesse al beneficio della detrazione fiscale.",
                'date' => $currentYear . '-03-18',
            ],
            [
                'name' => "Mod. INTRA – Febbraio",
                "description" => "dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-03-25',
            ],

            //aprile
            [
                'name' => "Versamento FIRR maturato " . ($currentYear - 1) . ": il Fondo Indennità di Risoluzione del Rapporto (FIRR)",
                "description" => "è la somma delle cifre messe da parte dalle aziende presso Enasarco a beneficio dei propri agenti. L’obbligo di questo versamento è a carico di tutte le ditte mandanti titolari di rapporti di agenzia che appartengono alle Organizzazioni sindacali firmatarie degli Accordi economici collettivi.",
                'date' => $currentYear . '-04-02',
            ],
            [
                'name' => "Mod. EAS per variazioni intervenute nel " . ($currentYear - 1) . ": il Modello EAS (Modello di comunicazione dei dati rilevanti ai fini fiscali relativo agli enti associativi) ",
                'description' => "è un documento dedicato agli enti non commerciali aventi natura associativa. Deve essere inviato all’Agenzia delle entrate.",
                'date' => $currentYear . '-04-02',
            ],
            [
                'name' => "Versamento IVA e ritenute – Marzo",
                'description' => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-04-16',
            ],
            [
                'name' => "Mod. INTRA – Marzo/1 trimestre",
                'description' => "dichiarazione mensile/trimestrale per le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-04-26',
            ],
            [
                'name' => "Versamento bollo scritture contab. " . ($currentYear - 1) . " conservate digitalmente",
                'description' => "(120gg dalla chiusura esercizio – art. 6, co. 2, DM 17.6.14): il pagamento dell’imposta di bollo deve essere eseguito esclusivamente con modalità telematiche tramite il modello F24.",
                'date' => $currentYear . '-04-29',
            ],
            [
                'name' => "Bilancio d'esercizio",
                'description' => "Termine ordinario per la presentazione del Bilancio d’esercizio, relativo all’esercizio" . ($currentYear - 1),
                'date' => $currentYear . '-04-29',
            ],
            [
                'name' => "Dichiarazione e liquidazione OSS – 1° trimestre",
                'description' => " è una dichiarazione che semplifica le procedure IVA per le imprese che effettuano vendite a distanza di beni e servizi digitali ai consumatori finali all’interno dell’Unione Europea. Questa dichiarazione permette di gestire le obbligazioni IVA relative a più stati membri attraverso un unico portale, il Portale OSS, evitando così alle imprese di dover registrarsi per l’IVA in ciascuno stato membro in cui operano.",
                'date' => $currentYear . '-04-30',
            ],
            [
                'name' => "Mod. IVA TR – 1° trimestre",
                'description' => "deve essere compilato da chi ha accumulato un surplus di imposta detraibile superiore a 2.582,28 euro e che desidera o chiedere il rimborso o optare per l’utilizzo in compensazione con altri tributi, contributi e premi, come previsto dall’articolo 17 del decreto legislativo 9 luglio 1997, n. 241.",
                'date' => $currentYear . '-04-30',
            ],
            [
                'name' => "Mod. IVA " . $currentYear . " – anno " . ($currentYear - 1),
                'description' => " la dichiarazione IVA per l’anno " . ($currentYear - 1) . " dovrà essere inoltrata nell’arco temporale che va dal 1° febbraio al 30 aprile " . $currentYear . ", come stabilito dall’articolo 8 del D.P.R. n. 322/1998. Qualora la dichiarazione venga presentata entro 90 giorni dalla scadenza, questa sarà considerata valida nonostante l’applicazione delle sanzioni previste dalla legge. Se il ritardo supera i 90 giorni, la dichiarazione sarà ritenuta omessa.",
                'date' => $currentYear . '-04-30',
            ],

            //maggio
            [
                'name' => "Versamento IVA e ritenute – Aprile",
                "description" => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-05-16',
            ],
            [
                'name' => "Versamento INPS fissi e IVA – 1° trimestre",
                "description" => "Chi opta per la liquidazione trimestrale dell’IVA deve versare l’eventuale saldo a debito del primo trimestre entro il 16 maggio.
                I contributi fissi sono quelli da versare indipendentemente dagli incassi e sono pari a 4.208,40€ per gli artigiani e 4.292,42€ per i commercianti (non regime forfettario).",
                'date' => $currentYear . '-05-16',
            ],
            [
                'name' => "Versamento Enasarco su provvigioni maturate 1° trimestre",
                "description" => "il contributo Enasarco, che ammonta al 17% delle provvigioni, viene suddiviso equamente il lavoratore e l’azienda : il 50% dell’importo, pari all’8,50%, è responsabilità dell’azienda, mentre l’altra metà è a carico del lavoratore.",
                'date' => $currentYear . '-05-20',
            ],
            [
                'name' => "Mod. INTRA – Aprile",
                "description" => " dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-05-27',
            ],
            [
                'name' => "Comunicazione LIPE – 1° trimestre",
                "description" => "il Modello Comunicazione liquidazioni periodiche IVA (LIPE) riporta tutti i i dati contabili riepilogativi delle liquidazioni periodiche iva, mensili o trimestrali contribuente. Serve a comunicare all’Agenzia delle Entrate i dati contabili relativi alle liquidazioni IVA periodiche svolte nel periodo di riferimento.",
                'date' => $currentYear . '-05-31',
            ],

            //giugno
            [
                'name' => "Versamento IVA e ritenute – Maggio",
                "description" => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-06-17',
            ],
            [
                'name' => "Versamento IMU, IMI (BZ), IMIS (TN), ILIA (FVG) – acconto " . $currentYear,
                "description" => "Si tratta del versamento dell’acconto IMU sulle imposte immobiliari. Sono le imposte dovute per il possesso di fabbricati, escluse le abitazioni principali classificate nelle categorie catastali diverse da A/1, A/8 e A/9, (prime case) di aree fabbricabili e di terreni agricoli. La tassa deve essere versata dal proprietario dell’immobile.",
                'date' => $currentYear . '-06-17',
            ],
            [
                'name' => "Mod. INTRA – Maggio",
                "description" => "dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-06-25',
            ],
            [
                'name' => "Termine lungo per la presentazione Bilancio d’esercizio,",
                "description" => "Termine lungo per la presentazione Bilancio d’esercizio, per coloro che lo presentano entro 180 giorni dalla chiusura dell’esercizio, se previsto dallo statuto e se ve ne sono i motivi che giustificano la proroga",
                'date' => $currentYear . '-06-29',
            ],
            //luglio
            [
                'name' => "Versam. saldo " . ($currentYear - 1) . " e 1° acconto " . $currentYear . " – mod. REDDITI/IRAP",
                "description" => "In genere, il termine per il versamento del saldo IRPEF dell’anno precedente, e dell’acconto per l’anno attuale è il 30 giugno, ma quest’anno cade di domenica, quindi slitta di un giorno.
                Anche se la dichiarazione va presentate il 30/09 (15/10 per il concordato preventivo) le imposte vanno già pagate in questa scadenza, o comunque la prima rata.
                L’IRAP, imposta regionale sulle attività produttive, è una tassa che i titolari di partita IVA, con alcune eccezioni, sono obbligati a versarla annualmente alla Regione in cui è ubicata l’azienda o viene esercitata la professione.",
                'date' => $currentYear . '-07-01',
            ],
            [
                'name' => "Dichiarazione IMU, IMI e ILIA variazioni anno 2023 (no per IMIS)",
                "description" => "la dichiarazione IMU,IMI e ILIA deve essere consegnata o inviata tramite modalità telematiche entro il 30 giugno dell’anno seguente a quello di inizio possesso degli immobili o di variazioni significative che incidono sulla tassazione. Per l’anno " . $currentYear . ", il termine per la presentazione è prorogato al 1° luglio, essendo il 30 giugno un giorno festivo.",
                'date' => $currentYear . '-07-01',
            ],
            [
                'name' => "Versamento IVA e ritenute – Giugno",
                "description" => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-07-16',
            ],
            [
                'name' => "Mod. INTRA – Giugno e 2° trimestre",
                "description" => " dichiarazione mensile/trimestrale che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-07-25',
            ],
            [
                'name' => "Dichiarazione e liquidazione OSS – 2° trimestre",
                "description" => "è una dichiarazione che semplifica le procedure IVA per le imprese che effettuano vendite a distanza di beni e servizi digitali ai consumatori finali all’interno dell’Unione Europea. Questa dichiarazione permette di gestire le obbligazioni IVA relative a più stati membri attraverso un unico portale, il Portale OSS, evitando così alle imprese di dover registrarsi per l’IVA in ciascuno stato membro in cui operano.",
                'date' => $currentYear . '-07-31',
            ],
            [
                'name' => "Versamento saldo " . ($currentYear - 1) . " e 1° acc. " . $currentYear . " – mod. REDDITI /IRAP + 0,40%",
                "description" => "questa scadenza è da osservare se si è scelto di slittare il versamento dell’acconto delle imposte dovute per i redditi che saranno conseguiti nel " . ($currentYear - 1) . " (ovvero da dichiarare nel Modello Redditi o Irap " . $currentYear . ") a luglio. Lo slittamento della scadenza comporta degli interessi del 0,40%.",
                'date' => $currentYear . '-07-31',
            ],
            [
                'name' => "Mod. IVA TR – 2° trimestre",
                "description" => "deve essere compilato da chi ha accumulato un surplus di imposta detraibile superiore a 2.582,28 euro e che desidera o chiedere il rimborso o optare per l’utilizzo in compensazione con altri tributi, contributi e premi, come previsto dall’articolo 17 del decreto legislativo 9 luglio 1997, n. 241.",
                'date' => $currentYear . '-07-31',
            ],

            //agosto
            [
                'name' => "Versamento IVA e ritenute – Luglio",
                "description" => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese (in questo caso slitta al 20). I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-08-20',
            ],
            [
                'name' => "Versamento INPS fissi e IVA – 2° trimestre",
                "description" => "i contributi fissi sono quelli da versare indipendentemente dagli incassi e sono pari a 4.208,40€ per gli artigiani e 4.292,42€ per i commercianti (non regime forfettario).",
                'date' => $currentYear . '-08-20',
            ],
            [
                'name' => "Versamento Enasarco su provvigioni maturate 2° trimestre",
                "description" => "il contributo Enasarco ( Ente nazionale di assistenza per gli agenti e i rappresentanti di commercio), che ammonta al 17% delle provvigioni, viene suddiviso equamente il lavoratore e l’azienda : il 50% dell’importo, pari all’8,50%, è responsabilità dell’azienda, mentre l’altra metà è a carico del lavoratore.",
                'date' => $currentYear . '-08-20',
            ],
            [
                'name' => "Mod. INTRA – Luglio",
                "description" => "dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-08-26',
            ],
            //settembre
            [
                'name' => "Versamento IVA e ritenute – Agosto",
                "description" => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-09-16',
            ],
            [
                'name' => "Mod. INTRA – Agosto",
                "description" => "Dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-09-25',
            ],
            [
                'name' => "Comunicazione LIPE – 2° trimestre",
                "description" => "Il Modello Comunicazione liquidazioni periodiche IVA (LIPE) riporta tutti i i dati contabili riepilogativi delle liquidazioni periodiche iva, mensili o trimestrali contribuente. Serve a comunicare all’Agenzia delle Entrate i dati contabili relativi alle liquidazioni IVA periodiche svolte nel periodo di riferimento.",
                'date' => $currentYear . '-09-30',
            ],
            [
                'name' => "Comunicazione spese al Sistema TS – 1° semestre " . $currentYear,
                "description" => "L’ultimo decreto RGS di proroga DM 27/12/2022 ha confermato che l’invio dei documenti attestanti il pagamento di spese sanitarie relative all’anno ".($currentYear - 1)." dovrà svolgersi su base semestrale.",
                'date' => $currentYear . '-09-30',
            ],

            [
                'name' => "Mod. 730/".$currentYear." – anno ".($currentYear-1)." (Termini differenziati per CAF/professionisti/)" . $currentYear,
                "description" => "Il modello 730, utilizzato per la dichiarazione dei redditi, è rivolto ai lavoratori dipendenti e ai pensionati.",
                'date' => $currentYear . '-09-30',
            ],

            //ottobre
            [
                'name' => "Mod. REDDITI ".$currentYear." e IRAP ".$currentYear." – anno " .($currentYear-1) ,
                "description" => "la scadenza per la presentazione della Dichiarazione dei redditi e dell’IRAP è stata posticipata dal 30 settembre al 15 ottobre per l’introduzione del Concordato preventivo biennale.",
                'date' => $currentYear . '-10-15',
            ],
            [
                'name' => "Versamento IVA e ritenute – Settembre" ,
                "description" => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-10-16',
            ],
            [
                'name' => "Mod. INTRA – Settembre e 3° trimestre" ,
                "description" => "Dichiarazione mensile/trimestrale delle operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali",
                'date' => $currentYear . '-10-25',
            ],
            [
                'name' => "Mod. IVA TR – 3° trimestre" ,
                "description" => "Deve essere compilato da chi ha accumulato un surplus di imposta detraibile superiore a 2.582,28 euro e che desidera o chiedere il rimborso o optare per l’utilizzo in compensazione con altri tributi, contributi e premi, come previsto dall’articolo 17 del decreto legislativo 9 luglio 1997, n. 241.",
                'date' => $currentYear . '-10-31',
            ],
            [
                'name' => "Mod. 770/".$currentYear." – anno ".($currentYear - 1)." + CU ".$currentYear." per compensi no 730" ,
                "description" => "è destinato ai sostituti d’imposta, incluse le Amministrazioni dello Stato, per comunicare elettronicamente all’Agenzia delle Entrate diverse informazioni (quale esempio: ritenute operate/versate, ritenute su dividendi, pagamenti effettuati dai sostituti d’imposta, crediti d’imposta impiegati e informazioni relative alle somme erogate a seguito di procedure di pignoramento presso terzi).",
                'date' => $currentYear . '-10-31',
            ],
            [
                'name' => "Dichiarazione e liquidazione OSS – 3° trimestre" ,
                "description" => "è una dichiarazione che semplifica le procedure IVA per le imprese che effettuano vendite a distanza di beni e servizi digitali ai consumatori finali all’interno dell’Unione Europea. Questa dichiarazione permette di gestire le obbligazioni IVA relative a più stati membri attraverso un unico portale, il Portale OSS, evitando così alle imprese di dover registrarsi per l’IVA in ciascuno stato membro in cui operano.",
                'date' => $currentYear . '-10-31',
            ],

            //novembr
            [
                'name' => "Versamento 2ª/3ª rata imposta sostitutiva rivalutazione terreni e partecipazioni posseduti all’1.1.".($currentYear - 1)." e all’1.1.".($currentYear - 2) ,
                "description" => "Versamento 2ª/3ª rata imposta sostitutiva rivalutazione terreni e partecipazioni posseduti all’1.1.".($currentYear - 1)." e all’1.1.".($currentYear - 2),
                'date' => $currentYear . '-11-15',
            ],
            [
                'name' => "Versamento IVA e ritenute – Ottobre" ,
                "description" => "Se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-11-18',
            ],
            [
                'name' => "Versamento INPS fissi e IVA – 3° trimestre" ,
                "description" => "Versamento INPS fissi e IVA – 3° trimestre",
                'date' => $currentYear . '-11-18',
            ],
            [
                'name' => "Versamento Enasarco su provvigioni maturate 3° trimestre" ,
                "description" => "il contributo Enasarco è suddiviso equamente tra il lavoratore e l’azienda : il 50% dell’importo, pari all’8,50%, è responsabilità dell’azienda, mentre l’altra metà è a carico del lavoratore.",
                'date' => $currentYear . '-11-20',
            ],
            [
                'name' => "Mod. INTRA – Ottobre" ,
                "description" => "dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-11-25',
            ],

            //dicembre

            [
                'name' => "Comunicazione LIPE – 3° trimestre" ,
                "description" => " il Modello Comunicazione liquidazioni periodiche IVA (LIPE) riporta tutti i i dati contabili riepilogativi delle liquidazioni periodiche iva, mensili o trimestrali contribuente. Serve a comunicare all’Agenzia delle Entrate i dati contabili relativi alle liquidazioni IVA periodiche svolte nel periodo di riferimento.",
                'date' => $currentYear . '-12-02',
            ],
            [
                'name' => "Versamento 2° acconto ".$currentYear." o unica soluz. – REDDITI/IRAP" ,
                "description" => "l’IRAP, imposta regionale sulle attività produttive, è una tassa che i titolari di partita IVA, con alcune eccezioni, sono obbligati a versarla annualmente alla Regione in cui è ubicata l’azienda o viene esercitata la professione",
                'date' => $currentYear . '-12-02',
            ],
            [
                'name' => "Versamento imposta di bollo su FE – 3° trimestre ( Incluso bollo 1° e 2° trimestre se importi < € 5.000)" ,
                "description" => "Versamento imposta di bollo su FE – 3° trimestre ( Incluso bollo 1° e 2° trimestre se importi < € 5.000)",
                'date' => $currentYear . '-12-02',
            ],
            [
                'name' => "Versamento IVA e ritenute – Novembre" ,
                "description" => "se sei un contribuente mensile dovrai versare l’IVA periodica ogni 16 del mese. I pagamenti dell’IVA periodici si effettuano attraverso l’utilizzo del modello F24, che deve essere presentato esclusivamente per via telematica.",
                'date' => $currentYear . '-12-16',
            ],
            [
                'name' => "Versamento IMU, IMI (BZ), IMIS (TN), ILIA (FVG) – saldo ". $currentYear ,
                "description" => "a fine anno si deve eseguire il saldo IMU delle imposte immobiliari che si somma all’acconto presentato a giugno dello stesso anno. Mentre per l’acconto è in genere la metà di quanto versato precedentemente, il saldo tiene conto delle aliquote aggiornate e deliberate dai comuni.",
                'date' => $currentYear . '-12-16',
            ],
            [
                'name' => "Versamento acconto imposta sost. rivalutazione TFR" ,
                "description" => "sulle somme rivalutate annualmente destinate al Trattamento di fine rapporto (Tfr) si applica, a partire dal 2015, un’imposta sostitutiva delle imposte sui redditi del 17%. Il pagamento dell’imposta è responsabilità del datore di lavoro o dell’ente pensionistico, il quale deve eseguirlo in due tranche.",
                'date' => $currentYear . '-12-16',
            ],
            [
                'name' => "Versamento acconto IVA 2024" ,
                "description" => "questo obbligo riguarda chiunque svolga attività commerciali, artistiche o professionali soggette a IVA, sia in ambito nazionale che internazionale. Non è richiesto il versamento dell’acconto IVA per importi inferiori a 103,29 euro.",
                'date' => $currentYear . '-12-27',
            ],
            [
                'name' => "Mod. INTRA – Novembre" ,
                "description" => "dichiarazione mensile che le operazioni intracomunitarie di vendita e acquisto effettuate da un titolare di partita IVA. Serve a monitorare il movimento di merci e servizi all’interno dell’UE per fini statistici e di controllo fiscale, contribuendo a garantire la corretta applicazione dell’IVA e delle politiche commerciali.",
                'date' => $currentYear . '-12-27',
            ],
        ];


        foreach ($yearlyDeadlines as $deadline) {
            YearlyDeadline::create($deadline);
        }
    }
}
