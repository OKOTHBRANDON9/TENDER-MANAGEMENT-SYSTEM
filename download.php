    <?php
    session_start();
    include("connection.php");

    $id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : '';

    $query = "SELECT * FROM bid_documents WHERE bid_id = $id";
    $result = mysqli_query($con, $query);
    $bid_document = mysqli_fetch_assoc($result);

    header("Content-Type: $bid_document[document_type]");
    header("Content-Disposition: attachment; filename=" . $bid_document['document_name']);
    echo $bid_document['document_url'];
    ?>


