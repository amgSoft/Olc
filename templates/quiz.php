<?php if($result != true) {?>
<section>
    <form enctype="multipart/form-data" action="index.php?view=quiz" method="post">

        <label for="firstname"> Jmeno
            <input id="firstname" type="text" name="firstname" class="widthInput"  maxlength="20"></label>
        <label for="lastname"> Přijmení
            <input id="lastname" type="text" name="lastname"  class="widthInput" maxlength="20"></label>
        <label for="bdate" > Datum narozénin
            <input id="bdate " type="date"  class="widthInput" name="bdate" value=""></label>
        <label for="status"> Rodinný stav
            <select id="status" name="status"  class="widthSelect" >
            <?php foreach (Lang::getStatus() as $val): ?>
                <option><?=$val ?></option>
            <?php endforeach; ?>
            </select></label>
        <label for="citizenship"> Státní občanství
        <select id="citizenship" name="citizenship" class="widthSelect" >
            <?php foreach ( Lang::getCitizen() as $val ): ?>
                <option><?=$val ?></option>
            <?php endforeach; ?>
        </select></label>
        <label for="education"> Vzdělání
        <select id="education" name="education" class="widthSelect">
            <?php foreach ( Lang::getEducation() as $val ): ?>
                <option><?=$val ?></option>
            <?php endforeach; ?>
        </select></label>
        <label for="tel"> Telefon
            <input id="tel" type="tel" name="tel" maxlength="16" class="widthInput" placeholder="773-074-876" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" ></label>
        <label for="email"> E-mail
            <input id="email" type="email" name="email" maxlength="50" class="widthInput" placeholder="E-mail" > </label>

            <label for="about"> Vlastnosti
                <textarea id="about" maxlength="200" class="widthInput" name="about"></textarea></label>



        <fieldset>
            <legend>Počítačové znalosti</legend>

            <label for="mysql">
                <input id="mysql" type="checkbox" name="know[]" value="Mysql">Mysql</label>
            <label for="oracle">
                <input id="oracle" type="checkbox" name="know[]" value="Oracle">Oracle</label>
            <label for="postgre">
                <input id="postgre" type="checkbox" name="know[]" value="PostgreSQL">PostgreSQL</label>
            <label for="centos6">
                <input id="centos6" type="checkbox" name="know[]" value="CestOS 6">CestOS 6</label>
            <label for="centos7">
                <input id="centos7" type="checkbox" name="know[]" value="CestOS 7">CestOS 7</label>
            <label for="jomla">
                <input id="jomla" type="checkbox" name="know[]" value="Joomla 3">Joomla 3</label>
            <label for="php">
                <input id="php" type="checkbox" name="know[]" value="Php5">Php5</label>
            <label for="css">
                <input id="css" type="checkbox" name="know[]" value="Css3">Css3</label>
            <label for="jquery">
                <input id="jquery" type="checkbox" name="know[]" value="Jquery">Jquery</label>
            <label for="javascript">
                <input id="javascript" type="checkbox" name="know[]" value="Javascript">Javascript</label>
            <label for="vcs">
                <input id="vcs" type="checkbox" name="know[]" value="VCS Git">VCS Git </label>
            <label for="laravel">
                <input id="laravel" type="checkbox" name="know[]" value="Laravel4">Laravel4</label>
        </fieldset>



        <fieldset class="file fieldset">
            <legend>Vložte svoje foto/max 30Kb</legend>
            <input type="file" name="foto" >
        </fieldset>
        <span class="message"><?=$errMessage ?></span>
        <input type="submit" name="next" class="button" value="Ukončit">
    </form>
</section>
<?php } else {?>
<section>
    <h3>
        <?=$showInfo['firstname']; ?>
        <?=$showInfo['lastname']; ?>
    </h3>
    <div >
        <div class="left">
            <span>Rok narození: <strong><?=$showInfo['bdate']; ?></strong></span>
            <span>Rodinný stav: <strong><?=$showInfo['status']; ?></strong></span>
            <span>Státní občanství: <strong><?=$showInfo['citizenship']; ?></strong></span>
            <span>Vzdělání: <strong><?=$showInfo['education']; ?></strong></span>
            <span>Telefon: <strong><?=isset($showInfo['tel'])? $showInfo['tel'] . "<br />" : ""; ?></strong></span>
            <span>E-mail: <strong><?=$showInfo['email']; ?></strong></span>
        </div>
        <div class="right">
            <?php if($fileUploud == true){ ?>
                <img src="<?=$objUpload->showFoto() ?>" width="100" height="115" />
            <?php }?>
        </div>
    </div>
    <fieldset class="fieldsetExt">
    <legend>Počítačové znalosti</legend>

        <?php foreach ($showInfo['know'] as $val): ?>
            <strong><?=$val ?> / </strong>
        <?php endforeach;?>

    </fieldset>

    <?php if(isset($showInfo['about'])){ ?>
    <fieldset class="fieldsetExt">
        <legend>Vlastnosti</legend>
        <strong><?=$showInfo['about'] ?></strong>
    </fieldset>
    <?php }else echo ""?>
    <input type="button" onclick="history.back()" value="Zpětně" class="button">
<?php } ?>

</section>