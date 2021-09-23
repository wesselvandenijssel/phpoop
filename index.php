<?php
class Table {
    private $_rows;
    public $_test;
    public $_draw;
    public function __construct() {
        $this->_rows = array();
        $this->_test = "Ik ben een variabele die van buitenaf te lezen is, want ik ben public" . PHP_EOL;
    }
    public function append($row) {
        $this->_rows[] = $row;
    }
    // public function draw() {
    // }
    public function draw() {
        echo '<table border="1">'.PHP_EOL; // Begin van de tabel, border voor de duidelijkheid
        
        foreach($this->_rows as $row) {
            echo '<tr>'.PHP_EOL;
            
            foreach($row->getCells() as $cell) {
                echo '<td>'.$cell->getContent().'</td>'.PHP_EOL;
            }
        
            echo '</tr>'.PHP_EOL;
        }
        
        echo '</table>'.PHP_EOL;
    }
 }
 class Row {
    private $_cells;
    public function __construct() {
        $this->_cells = array();
    }
    public function append($cell) {
        $this->_cells[] = $cell;
    }
    public function getCells() {
        return $this->_cells;
    }
 }
 class Cell {
    private $_content;
    public function __construct($content) {
        $this->_content = $content;
    }
    public function getContent() {
        return $this->_content;
    }
 }
$table = new Table();
echo $table->_test;    // Dit moet lukken, want de variabele is public
// $table->draw();
$cellA1 = new Cell('Dit is cel A1');
$cellA2 = new Cell('Dit is cel A2');

$rowA = new Row();
$rowA->append($cellA1);
$rowA->append($cellA2);
$rowA->append(new Cell('Dit is cel A3')); // Zo kan het ook!

// $table = new Table();
$table->append($rowA);
$table->draw();
// echo $table->_rows;  // Dit zou een error moeten opleveren, want de variabele is private
// $Row = new Row();
// $table = new Table();

?>
<!-- <table border="1">
<tr>
<td>Dit is cel A1</td>
<td>Dit is cel A2</td>
<td>Dit is cel A3</td>
</tr>
</table> -->
