<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/model/resource/check-create_or_update.php";
    
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - <?=$title ?></title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>

<body>



<!-- Home icon -->

<?php include $root."/logos/view/includes/header.php"; ?>


<br/><br/>


<form method='post' action='/logos/model/resource/create_update.php'>

<table class="record-table">
        <tr style="background-color: #ededeb;">
            <td style="padding: 20px; width: 180px;"><label for="id">Library ID</label></td>
            <td><input type="number" style="padding: 15px; width: 100px;" name="id" required step="1" value='<?= isset($resource['id']) ? htmlentities($resource['id']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="isbn">ISBN</label></td>
            <td><input type="text" class="medium-input" name="isbn" maxlength="50" value='<?= isset($resource['isbn']) ? htmlentities($resource['isbn']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input type="text" class="wide-input" name="title" required maxlength="100" value='<?= isset($resource['title']) ? htmlentities($resource['title']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="series">Series</label></td>
            <td><input type="text" class="wide-input" name="series" maxlength="100" value='<?= isset($resource_info['series']) ? htmlentities($resource_info['series']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="author">Author</label></td>
            <td><input type="text" class="wide-input" name="author" maxlength="100" value='<?= isset($resource_info['author']) ? htmlentities($resource_info['author']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="illustrator">Illustrator</label></td>
            <td><input type="text" class="wide-input" name="illustrator" maxlength="100" value='<?= isset($resource_info['illustrator']) ? htmlentities($resource_info['illustrator']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="publisher">Publisher</label></td>
            <td><input type="text"  class="wide-input" name="publisher" maxlength="100" value='<?= isset($resource_info['publisher']) ? htmlentities($resource_info['publisher']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="publication_date">Publication date</label></td>
            <td><input type="date" name="publication_date" value='<?= isset($resource_info['publication_date']) ? htmlentities($resource_info['publication_date']) : '' ?>'></td>
        </tr>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
        <tr>
            <td><label for="classification">Classification</label></td>
            <td><input type="text" class="short-input" name="classification" required maxlength="50" value='<?= isset($resource['classification']) ? htmlentities($resource['classification']) : '' ?>'></td>
        </tr>
        <tr>

            <td><label for="genre">Genre</label></td>
            <td>
                <select class="medium-input" name="genre">
                    <?php foreach ($genres as $genre) : ?>
                        <option <?= (!empty($library_info['genre']) && $library_info['genre'] == $genre['name']) ? 'selected' : '' ?> value='<?= $genre['name'] ?>'>
                            <?= htmlentities($genre['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <a href="logos/view/genres.php">create new genre</a>
                <div class="tooltip"><img src="/logos/view/media/help.png" id="helpicon">
                    <span class="tooltiptext">Genre: A style of work; e.g. Fantasy Fiction</span>
                </div>
            </td>
        </tr>
        <tr>
            <td><label for="subject_general">Subject Headings: General</label></td>
            <td>
                <input type="text" class="medium-input" name="subject_general" maxlength="255" value="PLACEHOLDER">
                <div class="tooltip"><img src="/logos/view/media/help.png" id="helpicon">
                    <span class="tooltiptext">General Subjects: What the work is about; e.g. Wizards, Magic</span>
                </div>
            </td>
        </tr>
        <tr>
            <td><label for="subject_specific">Subject Headings: Specific</label></td>
            <td>
                <input type="text" class="medium-input" name="subject_specific" maxlength="255" value="PLACEHOLDER">
                <div class="tooltip"><img src="/logos/view/media/help.png" id="helpicon">
                    <span class="tooltiptext">Specific Subjects: Keywords to uniquely identify the work; e.g. Harry Potter, Dumbledore</span>
                </div>
            </td>
        </tr>
        <tr>
            <td><label for="form">Form</label></td>
            <td>
                <input type="text" class="medium-input" name="form" maxlength="100" value='<?= isset($library_info['form']) ? htmlentities($library_info['form']) : '' ?>'>
                <div class="tooltip"><img src="/logos/view/media/help.png" id="helpicon">
                    <span class="tooltiptext">Form: What format the copy of the work takes; e.g. paperback</span>
                </div>

            </td>
        </tr>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
        <tr>
            <td colspan="2">
                        <br>
                <label for="summary">Summary</label><br/>
                <textarea id="summary" name="summary" maxlength="2048"><?= isset($resource_info['summary']) ? htmlentities($resource_info['summary']) : '' ?></textarea>
                        <br><br>
            </td>
        </tr>
                <br><br>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
            <tr>
            <td><label for="date_added">Date added</label></td>
            <td><input type="date" name="date_added"  value='<?= isset($library_info['date_added']) ? htmlentities($library_info['date_added']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="owner">Owner</label></td>
            <td><input type="text" name="owner" maxlength="100" value='<?= isset($library_info['owner']) ? htmlentities($library_info['owner']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="location">Location</label></td>
            <td><input type="text" name="location" maxlength="100" value='<?= isset($library_info['location']) ? htmlentities($library_info['location']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="reading_age">Reading age</label></td>
            <td><input type="number" name="reading_age" step="0.1" value='<?= isset($resource_info['reading_age']) ? htmlentities($resource_info['reading_age']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="provenance">Provenance</label></td>
            <td><input type="text" name="provenance" maxlength="255" value='<?= isset($library_info['provenance']) ? htmlentities($library_info['provenance']) : '' ?>'>
            <div class="tooltip"><img src="/logos/view/media/help.png" id="helpicon">
                <span class="tooltiptext">Provenence: Where the item was aquired from</span>
            </div>
        </tr>
        <tr>
            <td><label for="cost">Cost</td>
            <td><input type="number" min="0.00" step="0.01" name="cost" value='<?= isset($library_info['cost']) ? htmlentities($library_info['cost']) : '' ?>'></td>
        </tr>
    

        
    </table>
    <button type="submit"  class="back-button" name="submit">Submit</button>


</form>



<!-- Footer -->

    <?php include $root."/logos/view/includes/footer.php" ?>

<!-- End of Footer -->

</body>