<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Author</th>
      <th>Comments</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response To</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php


    $Query= "Select * From Comments";
    $ExecuteComments = mysqli_query($connection, $Query);
    if(!$ExecuteComments){
      die("Something went wrong... ".mysqli_error());
    }

    while($tuples = mysqli_fetch_assoc($ExecuteComments)){
      $comment_id = $tuples['comment_id'];
      $comment_hotel_id = $tuples['comment_hotel_id'];
      $comment_author = $tuples['comment_author'];
      $comment_email = $tuples['comment_email'];
      $comment_content = $tuples['comment_content'];
      $comment_status = $tuples['comment_status'];
      $comment_date = $tuples['comment_date'];

      echo "<tr>";
      echo "<td>$comment_id</td>";
      echo "<td>$comment_author</td>";
      echo "<td>$comment_content</td>";
      echo "<td>$comment_email</td>";
      echo "<td>$comment_status</td>";


      $subQuery = "Select * From Hotels Where HotelID= $comment_hotel_id";
      $executeSubQuery = mysqli_query($connection, $subQuery);

      while($info = mysqli_fetch_assoc($executeSubQuery)){
      $post_id = $info['post_id'];
      $post_title = $info['post_title'];
      echo "<td><a href='../hotels.php?p_id=$HotelID'>$HotelName</a></td>";
      }

      echo "<td>$comment_date</td>";

      // $CategoriesQueryID = "Select * From Category WHERE cat_id={$post_categories}";
      // $selectCategoriesID = mysqli_query($connection, $CategoriesQueryID);
      // $row = mysqli_fetch_assoc($selectCategoriesID);
      // $cat_title = $row['cat_title'];
      // echo "<td>$cat_title</td>";
      echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
      echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
      echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
      echo "</tr>";
    }


      ?>
  </tbody>
</table>


<!-- <?php

if(isset($_GET['delete'])) {
  $deleteID = $_GET['delete'];
  $deleteCommentQuery = "Delete From Comments Where CommentID={$deleteID}";
  $deleteComment = mysqli_query($connection, $deleteCommentQuery);
  header("Location: comments.php");
}

if(isset($_GET['unapprove'])) {
  $theComment = $_GET['unapprove'];
  $unapproveCommentQuery = "UPDATE Comments SET Status='unapproved' Where CommentID={$theComment}";
  $deleteComment = mysqli_query($connection, $unapproveCommentQuery);
  header("Location: comments.php");
}

if(isset($_GET['approve'])) {
  $approvingComment = $_GET['approve'];
  $approvingCommentQuery = "UPDATE Comments SET Status='approved' Where CommentID={$approvingComment}";
  $approveComment = mysqli_query($connection, $approvingCommentQuery);
  header("Location: comments.php");
}

 ?>
 -->
