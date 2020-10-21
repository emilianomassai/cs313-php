<?php
/**********************************************************
 * File: insertTopic.php
 * Author: Br. Burton
 *
 * Description: Takes input posted from topicEntry.php
 *   This file enters a new scripture into the database
 *   along with its associated topics.
 *
 *   This file does NOT do any rendering at all,
 *   instead it redirects the user to showTopics.php to see
 *   the resulting list.
 ***********************************************************/

// get the data from the POST
$book = $_POST['txtBook'];
$chapter = $_POST['txtChapter'];
$verse = $_POST['txtVerse'];
$content = $_POST['txtContent'];
$topicIds = $_POST['chkTopics'];

// For debugging purposes, you might include some echo statements like this
// and then not automatically redirect until you have everything working.

// echo "book=$book\n";
// echo "chapter=$chapter\n";
// echo "verse=$verse\n";
// echo "content=$content\n";

// we could (and should!) put additional checks here to verify that all this data is actually provided

require "../Team_Activity/dbConnect.php";
$db = get_db();

try
{
    // Add the Scripture

    // We do this by preparing the query with placeholder values
    $query = 'INSERT INTO scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
    $statement = $db->prepare($query);

    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    $statement->bindValue(':book', $book);
    $statement->bindValue(':chapter', $chapter);
    $statement->bindValue(':verse', $verse);
    $statement->bindValue(':content', $content);

    $statement->execute();

    // get the new id
    // $scriptures_id = $db->lastInsertId("scripture_id_seq");

    // Now go through each topic id in the list from the user's checkboxes
    foreach ($topic_ids as $topic_id) {
        echo "ScriptureId: $scriptures_id, topicId: $topic_id";

        // Again, first prepare the statement
        $statement = $db->prepare('INSERT INTO scripture_topic(scriptures_id, topic_id) VALUES(:scriptures_id, :topic_id)');

        // Then, bind the values
        $statement->bindValue(':scriptureId', $scriptures_id);
        $statement->bindValue(':topicId', $topic_id);

        $statement->execute();
    }
} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}

// finally, redirect them to a new page to actually show the topics
header("../Team_Activity/showTopics.php");

die();
// we always include a die after redirects. In this case, there would be no
// harm if the user got the rest of the page, because there is nothing else
// but in general, there could be things after here that we don't want them
// to see.