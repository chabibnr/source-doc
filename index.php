<?php
require_once './chabibnr/docblock/CreateDocBlock.php';
require_once './chabibnr/docblock/GetClass.php';
require_once './chabibnr/docblock/GetConstant.php';
require_once './chabibnr/docblock/GetMethod.php';
require_once './chabibnr/docblock/GetProperty.php';
require_once './chabibnr/docblock/Document.php';
require_once './main.php';
$data = new \chabibnr\docblock\CreateDocBlock('App\Main');
$class = $data->getClass();
$classMethod = $data->getMethod();
$constant = $data->getConstant();
$classProperty = $data->getProperty();

?>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    </head>
    <body>
    <div class="container">
        <h2>Class <?= $class->getName() ?></h2>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>Subclasses</th>
                <td><?= $class->getSubclasses() ?></td>
            </tr>
            <tr>
                <th>Available Since</th>
                <td><?= $class->identity['since'] ?></td>
            </tr>
            <tr>
                <th>Author</th>
                <td>
                    <?php
                    if (isset($class->identity['author'][0])) {
                        echo $class->identity['author'][0]['name'] . " &lt;" . $class->identity['author'][0]['email'] . "&gt;";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <strong><?= $class->identity['summary'] ?></strong>
        <p><?= $class->identity['description'] ?></p>

        <h2>Properties</h2>
        <table class="table table-bordered table-stripped">
            <thead>
            <tr>
                <th>Property</th>
                <th>Type</th>
                <th>Description</th>
                <th>Since</th>
                <th>Version</th>
                <th>Defined By</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($classProperty->all() as $methodName => $property):
                ?>
                <tr>
                    <td><a href="#$<?= $methodName ?>-detail">$<?= $methodName ?></a></td>
                    <td></td>
                    <td><?= $property['identity']['summary'] ?></td>
                    <td><?= $property['identity']['since'] ?></td>
                    <td><?= $property['identity']['version'] ?></td>
                    <td><?= $property['defined'] ?></td>
                </tr>
                <!--
                <tr>
                    <td colspan="6">
                        <?= \Michelf\Markdown::defaultTransform($property['identity']['description']) ?>
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr class="info">
                                <td colspan="2" class="text-primary">public function <?= $methodName ?>()</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>$param</td>
                                <td>Array</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> -->
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Methods</h2>
        <table class="table table-bordered table-stripped">
            <thead>
            <tr>
                <th>Property</th>
                <th>Type</th>
                <th>Description</th>
                <th>Since</th>
                <th>Version</th>
                <th>Defined By</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($classMethod->all() as $methodName => $property):
                ?>
                <tr>
                    <td><a href="#<?= $methodName ?>()-detail"><?= $methodName ?>()</a></td>
                    <td></td>
                    <td><?= $property['identity']['summary'] ?></td>
                    <td><?= $property['identity']['since'] ?></td>
                    <td><?= $property['identity']['version'] ?></td>
                    <td><?= $property['defined'] ?></td>
                </tr>
                <!--
                <tr>
                    <td colspan="6">
                        <?= \Michelf\Markdown::defaultTransform($property['identity']['description']) ?>
                        <table class="table table-condensed table-bordered">
                            <thead>
                            <tr class="info">
                                <td colspan="2" class="text-primary">public function <?= $methodName ?>()</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>$param</td>
                                <td>Array</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> -->
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </body>
    </html>
<?php
/*
echo "<pre>";
print_r($classMethod->all());
echo "</pre>";
*/