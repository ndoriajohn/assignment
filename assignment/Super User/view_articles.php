<?php
// Include database connection file
require_once 'DbConn.php';

// Fetch the last 6 articles in descending order by article_created_date
$sql = "SELECT * FROM articles ORDER BY article_created_date DESC LIMIT 6";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .article-container {
            width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .export-links {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>View Articles</h2>
    <div class="article-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h3>{$row['title']}</h3>";
                echo "<p>{$row['content']}</p>";
                echo "<p>Created Date: {$row['article_created_date']}</p>";
                echo "<div class='export-links'><a href='export_pdf.php?article_id={$row['article_id']}'>Export as PDF</a> | <a href='export_text.php?article_id={$row['article_id']}'>Export as Text</a></div>";
                echo "<hr>";
            }
        } else {
            echo "<p>No articles found</p>";
        }
        ?>
    </div>
</body>
</html>

