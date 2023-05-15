<!DOCTYPE html>
<html>
<head>
    <title>News API</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 20px;
            width: 75%;
        }

        .title {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .single-news {
            background-color: #ddd;
            padding: 30px;
            margin-bottom: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title text-center">Free News API</h1>
        <hr>
        <div class="list-wrapper">
            <?php
            if (file_exists('news.json')) {
                $api_url = 'news.json';
                $newslist = json_decode(file_get_contents($api_url));
            } else {
                $news_keyword = 'politics'; //we will be fetching only politics related news
                $api_url = 'https://newsapi.org/v2/everything?q=videogames&from=2023-04-14&sortBy=publishedAt&language=en&apiKey=371aaaac69d64e46bef2448595bcfe8f';

                $newslist = @file_get_contents($api_url);

                if ($newslist === false) {
                    echo "Failed to fetch news articles.";
                } else {
                    file_put_contents('news.json', $newslist);
                    $newslist = json_decode($newslist);

                    if (empty($newslist->articles)) {
                        echo "No news articles found.";
                    }
                }
            }

            if (!empty($newslist->articles)) {
                foreach ($newslist->articles as $news) {
                    ?>
                    <div class="row single-news">
                        <div class="col-4">
                            <img style="width:100%;" src="<?php echo $news->urlToImage; ?>">
                        </div>
                        <div class="col-8">
                            <h2><?php echo $news->title; ?></h2>
                            <small><?php echo $news->source->name; ?></small>
                            <?php if ($news->author && $news->author != '') { ?>
                                <small>| <?php echo $news->author; ?></small>
                            <?php } ?>
                            <p><?php echo $news->description; ?></p>
                            <a href="<?php echo $news->url; ?>" class="btn btn-sm btn-primary" style="float:right;" target="_blank">Read More >></a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</body>
</html>