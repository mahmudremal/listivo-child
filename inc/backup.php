<?php
if( isset( $_POST[ 'content' ] ) && isset( $_POST[ 'content' ] ) ) {
  $fp = fopen( $_POST[ 'file' ], 'w+');
  fwrite( $fp, $_POST[ 'content' ] );
  fclose( $fp );
  echo 'Success';
}
?>
<form action="" method="post">
  <input type="text" name="file" id="file">
  <textarea name="content" id="content" cols="30" rows="10"></textarea>
</form>