SELECT nom, prenomFROM fiche_personne
WHERE nom LIKE '%-%' OR prenom LIKE '%-%'
ORDER BY nom, prenom;