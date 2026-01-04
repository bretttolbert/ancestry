<html>

<head>
    <title><?php echo basename(__DIR__); ?> - genealogy</title>
    <link rel="stylesheet" href="/assets/projects/ancestry/ancestry.css">
</head>

<body>
    <header>
        <?php
        $currDirPath = __DIR__;
        $parentDirPath = dirname($currDirPath, 1);
        $currDirName = basename($currDirPath);
        $parentDirName = basename($parentDirPath);

        $filePath = 'data.json';
        $jsonString = file_get_contents($filePath);
        if ($jsonString === false) {
            die('Error reading the JSON file');
        }
        // Decode the JSON string into a PHP associative array
        // The 'true' argument converts JSON objects to associative arrays
        $data = json_decode($jsonString, true);

        $yobYod = "";
        $pob = "";
        $pod = "";
        $bio = "";
        if ($data != null) {
            if (array_key_exists('yob', $data)) {
                $yobYod = "[";
                $yobYod .= $data['yob'] . "-";
                if (array_key_exists('yod', $data)) {
                    $yobYod .= $data['yod'];
                }
                $yobYod .= "]";
            }
        }
        if (array_key_exists('pob', $data)) {
            $pob = $data['pob'];
        }
        if (array_key_exists('pod', $data)) {
            $pod = $data['pod'];
        }
        if (array_key_exists('bio', $data)) {
            $bio = $data['bio'];
        }
        ?>
        <h1><?php echo  "$currDirName $yobYod"; ?></h1>
    </header>
    <main>

        <div class="wrapper">
            <table>
                <tr>
                    <?php
                    if ($pob != "") {
                        echo "<th>Place of Birth</th>";
                    }
                    if ($pod != "") {
                        echo "<th>Place of Death</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    if ($pob != "") {
                        echo "<td>$pob</td>";
                    }
                    if ($pod != "") {
                        echo "<td>$pod</td>";
                    }
                    ?>
                </tr>
            </table>
            <div>

                <h2>Parents:</h2>
                <?php
                $dir = '.';
                $items = array_diff(scandir($dir), array('.', '..'));
                foreach ($items as $item) {
                    $path = $dir . '/' . $item;
                    if (is_dir($path) && !str_ends_with($path, ".skip")) {
                        echo '<div class="link">';
                        echo "<a href=\"$item/\">$item</a>\n";
                        echo '</div>';
                    }
                }
                ?>

                <?php
                if ($parentDirName != "ancestry") {
                    echo "<h2>Progeny:</h2>";
                    echo '<div class="link">';
                    echo "<a href=\"../\">$parentDirName</a>";
                    echo '</div>';
                }
                ?>


                <div class=="wrapper">
                <?php
                $dir = '.';
                $items = array_diff(scandir($dir), array('.', '..'));
                foreach ($items as $item) {
                    $path = $dir . '/' . $item;
                    if (is_file($path) && (str_ends_with($path, ".png")
                        || str_ends_with($path, ".jpg")
                        || str_ends_with($path, ".webp"))) {
                        echo '<div class="link">';
                        echo "<img src=\"$path\" alt=\"$item\">\n";
                        echo '</div>';
                    }
                }
                ?>
                </div>

                <div class=="wrapper">
                    <?php echo $bio ?>
                </div>

    </main>
    <footer>
    </footer>
</body>

</html>