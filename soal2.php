<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pattern Generator</title>
</head>
<body>
    <h2>Pattern Generator</h2>
    <form method="POST">
        <label for="dimension">Dimensi:</label>
        <input type="text" id="dimension" name="dimension">
        <br>

        <label for="direction">Direction:</label>
        <select id="direction" name="direction">
            <option value="Up-Down">Up-Down</option>
            <option value="Down-Up">Down-Up</option>
            <option value="Left-Right">Left-Right</option>
            <option value="Right-Left">Right-Left</option>
        </select>
        <br>

        <label for="value">Value:</label>
        <select id="value" name="value">
            <option value="Alphabet">Alphabet</option>
            <option value="Odd Numbers">Angka Ganjil</option>
            <option value="Even Numbers">Angka Genap</option>
        </select>
        <br>

        <button type="submit" name="generate">Generate</button>
    </form>

    <?php
    if (isset($_POST['generate'])) {
        $dimension = intval($_POST['dimension']);
        $direction = $_POST['direction'];
        $value = $_POST['value'];

        if ($dimension % 2 === 0 || $dimension < 3 || $dimension > 9) {
            echo "Invalid dimension. Must be an odd number between 3 and 9.";
        } else {
            $matrix = array();
            // Fill the matrix based on the value selection
            if ($value == "Alphabet") {
                $char = 'A';
                for ($i = 0; $i < $dimension; $i++) {
                    for ($j = 0; $j < $dimension; $j++) {
                        $matrix[$i][$j] = $char++;
                    }
                }
            } else if ($value == "Odd Numbers") {
                $num = 1;
                for ($i = 0; $i < $dimension; $i++) {
                    for ($j = 0; $j < $dimension; $j++) {
                        $matrix[$i][$j] = $num;
                        $num += 2;
                    }
                }
            } else if ($value == "Even Numbers") {
                $num = 2;
                for ($i = 0; $i < $dimension; $i++) {
                    for ($j = 0; $j < $dimension; $j++) {
                        $matrix[$i][$j] = $num;
                        $num += 2;
                    }
                }
            }

            // Print the matrix based on the direction
            echo "<pre>";
            if ($direction == "Up-Down") {
                for ($i = 0; $i < $dimension; $i++) {
                    for ($j = 0; $j < $dimension; $j++) {
                        echo $matrix[$j][$i] . " ";
                    }
                    echo "\n";
                }
            } else if ($direction == "Down-Up") {
                for ($i = $dimension - 1; $i >= 0; $i--) {
                    for ($j = $dimension - 1; $j >= 0; $j--) {
                        echo $matrix[$j][$i] . " ";
                    }
                    echo "\n";
                }
            } else if ($direction == "Left-Right") {
                for ($i = 0; $i < $dimension; $i++) {
                    for ($j = 0; $j < $dimension; $j++) {
                        echo $matrix[$i][$j] . " ";
                    }
                    echo "\n";
                }
            } else if ($direction == "Right-Left") {
                for ($i = 0; $i < $dimension; $i++) {
                    for ($j = $dimension - 1; $j >= 0; $j--) {
                        echo $matrix[$i][$j] . " ";
                    }
                    echo "\n";
                }
            }
            echo "</pre>";
        }
    }
    ?>
</body>
</html>
