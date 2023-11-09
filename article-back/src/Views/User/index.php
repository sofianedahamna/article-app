<?php

foreach ($eleves as $eleve) {
    echo $eleve->getName();
    echo " <a href='index.php?controller=user&method=edit&id=".$eleve->getId()."'>Editer</a>";;
    echo " <a href='index.php?controller=user&method=delete&id=".$eleve->getId()."'>Editer</a>";

}
?>

<form action="<?php echo $action;?>">
    <input type='text' name='name' value="<?php echo (isset($eleve)) ? $eleve->getName() : '';?>">
</form>