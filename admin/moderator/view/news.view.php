
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <?php  include '../../Include/showMessages.php';?>
    

    <h1 class="display-4 text-center">Vesti</h1><hr>

    <?php if( count($getNews) > 0 ): ?>
        <div class="card my-4">
            <table class="table table-hover table-borderles m-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>News</th>
                        <th>Autor</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($getNews as $news): ?>
                        <tr>
                            <td class="p-0"><img src="../../asets/news_img/<?php echo $news->img; ?>" alt="news image" class="img-fluid news_img" ></td>
                            <td><?php echo $news->title; ?></td>
                            <td><?php echo showMore($news->news); ?></td>
                            <td><?php echo $news->autor; ?></td>
                            <td><?php echo formatDateTime($news->date); ?></td>
                            <td><a href="updateNews.php?id=<?php echo $news->id; ?>" class="btn btn-primary btn-sm">Update</a></td>
                            <td><a href="deleteNews.php?id=<?php echo $news->id; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <h2>Unesite vesti</h2>
    <?php endif; ?>
    

    <a href="createNews.php" class="btn btn-info mb-5" >Unesite Vest</a>
</div>


<?php include '../../include/footer.php';?>



