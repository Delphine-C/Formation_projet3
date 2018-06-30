<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 30/06/2018
 * Time: 15:11
 */
$title='Contact';

ob_start(); ?>
    <header>
        <h2>A propos de Jean Forteroche</h2>
    </header>

    <aside>
         <img id="portrait" src="web/images/smile-man.jpeg">
    </aside>
<div class="container ">
    <div class="row col-lg-8">
    <section>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ergo adhuc, quantum equidem intellego, causa non videtur fuisse mutandi nominis. Quorum altera prosunt, nocent altera. Audeo dicere, inquit. Piso, familiaris noster, et alia multa et hoc loco Stoicos irridebat: Quid enim? Illud dico, ea, quae dicat, praeclare inter se cohaerere. Sit, inquam, tam facilis, quam vultis, comparatio voluptatis, quid de dolore dicemus? </p>

        <p>Duo Reges: constructio interrete. Nosti, credo, illud: Nemo pius est, qui pietatem-; Sed virtutem ipsam inchoavit, nihil amplius. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; Scrupulum, inquam, abeunti; Sed erat aequius Triarium aliquid de dissensione nostra iudicare. Respondent extrema primis, media utrisque, omnia omnibus. Duo enim genera quae erant, fecit tria. </p>
    </section>
</div>
</div>


<?php
$content=ob_get_clean();
require('view/template.php');
?>