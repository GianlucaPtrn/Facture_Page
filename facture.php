<link rel="stylesheet" href="css/facture.css">
<div class="containerFull">
    <div class="BlockHeaderFacture">
        <div class="containerTitle">
            <p class="TitleFacture">il n'a <span class="textGreen">jamais</span> été aussi <span class="textGreen">simple</span> de payer une facture</p>
            <p class="SecTitleFacture">grâce à notre <span class="textGreen">partenaire STRIPE</span></p>
        </div>
        <!-- si parents ou éleves alors afficher cette partie -->
        <?php if($_SESSION['role'] == "parent" || $_SESSION['role'] == "student"): ?>
            <div class="boxT-2">
                <div class="colCard-1">
                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-handshake-simple"></i></span>
                        <h1 class="textCard">Rapide et efficace</h1>
                    </div>
                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-users"></i></span>
                        <h1 class="textCard">Simple d'utilisation</h1>
                    </div>
                </div>
                <div class="colCard-2">
                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-shield-halved"></i></span>
                        <h1 class="textCard">Payer en toute sécurité</h1>
                    </div>
                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-seedling"></i></span>
                        <h1 class="textCard">Responsable de l'environnement</h1>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- si secrétaire alors afficher cette partie -->
        <?php if($_SESSION['role'] == "secretary"): ?>
            <div class="containerHeaderSearchBar">
                <?php require_once 'components/searchBar.php'; ?>
                <a class="btnFacture" href="index.php?/templates/factures/newFacture">Créé une facture</a>
            </div>
            
        <?php endif; ?>
    </div>
    
    <!-- Block commun a tous -->
    <div class="containerFacture">
        <div class="BlocTitleFacture">  
            <p>En attente de payement</p>
        </div>
        <!-- Afficher les factures si elle ne sont pas payé -->
        <?php foreach ($_SESSION['resultFacture'] as $resultFacture): ?>
            <?php if($resultFacture['paye'] === 0): ?>
                <div class="blocFacture">
                    <p class="factureNameDesti">Nom : <?=$resultFacture['name'] ?></p>
                    <p class="factureFirstNameDesti">Prenom : <?= $resultFacture['firstName'] ?></p>
                    <p class="factureAdressDesti">Adresse : <?= $resultFacture['adress'] ?></p>
                    <p class="facturePostalCodeDesti">Code Postal : <?= $resultFacture['postalCode'] ?></p>
                    <p class="descritptionFacture">Description : <?= $resultFacture['communication'] ?></p>
                    <p class="montantFacture">Montant : <?= $resultFacture['montant'] ?> €</p>

                    <!-- Si parent ou éleve, ils ont le bouton payés -->
                    <?php if($_SESSION['role'] == "parent" || $_SESSION['role'] == "student"): ?>
                        <button class="BtnPayerFacture">PAYER</button>
                    <?php endif; ?>
                    <!-- Si secrétaire, il a le bouton modifié -->
                    <?php if($_SESSION['role'] == "secretary") : ?>
                        <button class="BtnPayerFacture bckgColorGreen">Modifier</button>
                        <button class="BtnPayerFacture bckgColorRed">Supprimer</button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
                    
        <div class="BlocTitleFacture">
            <p>Historique de payement</p>
        </div>
        <!-- Afficher les factures si elle sont payé -->
        <?php foreach ($_SESSION['resultFacture'] as $resultFacture): ?>
            <?php if($resultFacture['paye'] === 1): ?>
                <div class="blocFacture">
                <p class="factureNameDesti">Nom : <?=$resultFacture['name'] ?></p>
                    <p class="factureFirstNameDesti">Prenom : <?= $resultFacture['firstName'] ?></p>
                    <p class="factureAdressDesti">Adresse : <?= $resultFacture['adress'] ?></p>
                    <p class="facturePostalCodeDesti">Code Postal : <?= $resultFacture['postalCode'] ?></p>
                    <p class="descritptionFacture">Description : <?= $resultFacture['communication'] ?></p>
                    <p class="montantFacture">Montant : <?= $resultFacture['montant'] ?> €</p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>