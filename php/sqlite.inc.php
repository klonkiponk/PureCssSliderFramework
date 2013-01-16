<?php
date_default_timezone_set('UTC');


/**
 * generateDBObject function.
 * 
 * @access public
 * @return void
 */
function generateDBObject(){
    $GLOBALS['DB'] = new SQLiteDatabase('db/notes.sqlite',0666,$error);
}



/**
 * createTable function.
 * 
 * @access public
 * @return void
 */
function createTable()
{
    $sql = "CREATE TABLE notes (
            id INTEGER PRIMARY KEY,
            title TEXT,
            content TEXT,
            date INTEGER,
            done BOOLEAN
        )";
    $GLOBALS['DB']->queryExec($sql,$error);
}

/**
 * insertIntoDB function.
 * 
 * @access public
 * @return void
 */
function insertIntoDB()
{
//semicolon in line 41 cause of 2 queries 
    $sql = "INSERT INTO notes (
                title,
                content,
                date
                )
            VALUES (
                'Prepare Statements',
                'Use prepared Statements for Database',
                '".date('Y')."'
                )
            ";
    $GLOBALS['DB']->queryExec($sql);
}

function noteWriteToDB()
{
    $sql = "INSERT INTO notes (
                title,
                content,
                date
            )
            VALUES (
                '{$_POST['noteTitle']}',
                '{$_POST['noteContent']}',
                '".date('Y-m-d')."'
            )
            ";
//    echo $sql;
    $GLOBALS['DB']->queryExec($sql);
}



/**
 * selectFromDB function.
 * 
 * @access public
 * @return void
 */
function selectFromDB()
{
    $sql = "SELECT * FROM notes";
    $result = $GLOBALS['DB']->query($sql,SQLITE_BOTH, $error);
    
    $return = "";
    
    while ($row = $result->fetch())
    {       
        $return .= "<div class='note box-shadow border-radius'>";
        $return .= "<h4 class='icon-chevron-right text-shadow'>";
        $return .= $row['title'];
        $return .= "</h4>";
        $return .= "<div class='noteContent'>";        
        $return .= $row['content'];
        $return .= "</div>";
        $return .= "<form method='post' action=''><input type='hidden' name='id' value='".$row['id']."'><input type='submit' name='delete' value='delete'></form>";        
        $return .= "</div>";
    }
    
    return $return;
}


function noteMarkDone(){
    $sql = "UPDATE TABLE notes SET done=1 WHERE id={$_POST['NoteID']}";
    $GLOBALS['DB']->queryExec($sql,$error);
}

function deleteFromDB(){
    $sql = "DELETE FROM notes WHERE id={$_POST['id']}";
    $GLOBALS['DB']->queryExec($sql,$error);
}
generateDBObject();
//insertIntoDB();
//createTable();