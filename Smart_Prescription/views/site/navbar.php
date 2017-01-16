<?php
use yii\helpers\Html;

?>

<?php
    if(Yii::$app->user->isGuest) {

    } else {
        if((Yii::$app->user->identity->roleId) == 1) {
?>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../admin/index">Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../user/userlist">All Users</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../user/create">Add New User</a></li>
                    </ul>
                </li>

            <ul class="nav navbar-nav navbar-right">
                <?php
                if(Yii::$app->user->isGuest) {

                } else {
                    ?>
                    <li><a href="../site/logout">Logout</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    </nav>
<?php
} else if((Yii::$app->user->identity->roleId) == 2) {
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index">Teacher</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Patient <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="../patient/index">Patient</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../patient/create">Add New Patient</a></li>
            </ul>
        </li>
        </ul>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Allergy <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../allergy/index">Allergy</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="../allergy/create">Add New Allergy</a></li>
                </ul>
            </li>
            </ul>
                <?php
                if(Yii::$app->user->isGuest) {

                } else {
                    ?>
                    <li><a href="../site/logout">Logout</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
        <?php
        } else if((Yii::$app->user->identity->roleId) == 3) {
            ?>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index">Allergy</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="../allergy/index">Allergy Report <span class="sr-only">(current)</span></a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            if(Yii::$app->user->isGuest) {

                            } else {
                                ?>
                                <li><a href="../site/logout">Logout</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php
        }
    }
?>