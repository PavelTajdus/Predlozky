# Zalomení předložek

Zdrojový kód v PHP pro online nástroj. Inspiroval jsem se pluginem pro wordpress, který řeší podobné věci. A doplnil jsem další jevy. 

Pomoci ```preg_replace()``` vyhledá v textu předložky, a doplní za ně nedělitelnou mezeru ```&nbsp;```. Následně lze vygenerovaný text uložit do schránky a použít třeba v emailingu či jinde.

Kód je psán velmi jednoduše. Žádné složitosti.

## Pravidla českého pravopisu

Podle pravidel českého pravopis jsem prozatím implementovat jen část úprav. Viz. [https://prirucka.ujc.cas.cz/?id=880](https://prirucka.ujc.cas.cz/?id=880)

Nástroj řeší:
- spojení neslabičných předložek k, s, v, z s následujícím slovem, např. k mostu, s bratrem, v Plzni, z nádraží
- spojení slabičných předložek o, u a spojek a, i s výrazem, který po nich následuje, např. u babičky, o páté
- členění čísel, např. 2 500, 1 000 000, 25,325 23
- mezery mezi číslem a značkou, např. 50 %, § 23, # 26, * 1921, † 2000
- řeší mezery mezi číslem a zkratkou počítaného předmětu nebo písmennou značkou jednotek a měn, např. 8 hod., 100 m², 10 kg, 16 h, 19 °C, 1 000 000 Kč, 250 €
- řeší mezery mezi číslem a názvem počítaného jevu, např. 500 lidí, 365 dní, 10 kilogramů
- mezery v telefonních, faxových a jiných číslech členěných mezerou, např. +420 800 123 987, 723 456 789, 800 11 22 33
- odstraní vícenásobné mezery a nechá pouze jednu

Další úpravy budou následovat časem.