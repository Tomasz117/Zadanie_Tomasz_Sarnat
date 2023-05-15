<?php
class Stack {
    private $size;
    private $stack;
    
    public function __construct($size) {
        $this->size = $size;
        $this->stack = [];
    }
    
    public function push($value) {
        if (!$this->isFull()) {
            array_push($this->stack, $value);
            echo "Element $value został dodany do stosu.\n";
        } else {
            echo "Stos jest pełny. Nie można dodać elementu.\n";
        }
    }
    
    public function pop() {
        if (!$this->isEmpty()) {
            $value = array_pop($this->stack);
            echo "Usunięto element $value ze stosu.\n";
            return $value;
        } else {
            echo "Stos jest pusty. Nie można usunąć elementu.\n";
            return null;
        }
    }
    
    public function isEmpty() {
        return empty($this->stack);
    }
    
    public function isFull() {
        return count($this->stack) >= $this->size;
    }
    
    public function getSize() {
        return count($this->stack);
    }
    
    public function printStack() {
        echo "Zawartość stosu: ";
        if ($this->isEmpty()) {
            echo "Stos jest pusty.\n";
        } else {
            echo implode(', ', $this->stack) . "\n";
        }
    }
}

$stack = new Stack(6);

while (true) {
    echo "Wybierz akcję:\n";
    echo "1. Push\n";
    echo "2. Pop\n";
    echo "3. Print\n";
    echo "0. Exit\n";
    
    $choice = readline("Twój wybór: ");
    
    switch ($choice) {
        case '1':
            $value = (int)readline("Podaj wartość do dodania: ");
            $stack->push($value);
            break;
        case '2':
            $stack->pop();
            break;
        case '3':
            $stack->printStack();
            break;
        case '0':
            exit("Program zakończył działanie\n");
        default:
            echo "Nieprawidłowy wybór. Spróbuj ponownie.\n";
    }
    
    echo "\n";
}
?>
