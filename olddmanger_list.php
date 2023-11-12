<?php 
    include("Fconnection.php");
    $query="SELECT * FROM 舍監";
    $query_list=mysqli_query($link,$query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="sample_style.css" type="text/css" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
            crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
            crossorigin="anonymous"></script>
        <title></title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <a class="navbar-brand" href="/">WebTest</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/Home/Privacy">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <P><h1 class="text-center text-dark">舍監名單</h1></P>
        <table class="table">
            <thead>
                <tr>
                    <th>舍監姓名</th>
                    <th>Mail</th>
                    <th>電話</th>
                    <th>帳號</th>
                    <th>密碼</th>
                </tr>
            </thead>
            <?php
				if(mysqli_num_rows($query_list) > 0)
				{
					foreach($query_list as $row)
					{
			?>
							<tr>
                                <?php $phpID=$row['舍監帳號'];?>
								<td><?php echo $row['舍監姓名']; ?></td> 
								<td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['連絡電話']; ?></td>
								<td><?php echo $row['舍監帳號']; ?></td> 
								<td><?php echo $row['密碼']; ?></td>
                                <td>
                                    <a href="dmanger_edit.php?ID=<?=$phpID?>" class="btn-link"><button type="button" class="btn btn-primary">Edit</button></a>
                                    <a href="dmangersql_delete.php?ID=<?=$phpID?>" class="btn-link"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
							</tr>
			<?php
                    }

                }
            ?>
            </tbody>
        </table>
    </body>
</html>