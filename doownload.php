<table>
  <tr>
    <th>Bid Document</th>
    <th>Download</th>
  </tr>
  <?php
  $query = "SELECT * FROM bid_documents";
  $result = mysqli_query($con, $query);

  while ($bid_document = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td><a href='$bid_document[document_url]' target='_blank'>" . $bid_document['document_name'] . "</a></td>";
    echo "<td><a href='download.php?id=" . $bid_document['id'] . "' target='_blank'>Download</a></td>";
    echo "</tr>";
  }
  ?>
</table>