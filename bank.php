<?php
 class BankAccount{
    protected $name;
    protected $balance;
     public function __construct($name,$balance)
     {
    $this->name=$name;
    $this->balance=$balance;
     }
      
     public function deposite($amount)//this method in callback not use
     {
        $this->amount=$amount;
        $total_balance=$amount+$balance;
        return "Your balance :$total_balance"."<br>";
     }
 
      public function withdraw($draw)
      {
        if($draw < $this->balance)
        {
            $total_draw=$this->balance - $draw;
             echo "Total balance:$total_draw"."<br>";
        }else{
            echo "Your balance is total amout low"."<br>";
        }
      }
 }

 class Checkingaccount extends BankAccount{
        
    public function insufficentFee($dolars)
    {
        $this->dolar=$dolars;
        $add_balance=$this->balance+$dolars;
        return "Your balance:".$add_balance."<br>";
    }

    public function ProcessCheck()
    {
        echo "Process Check"."<br>";
    }

    public function withdraw($add)
    {
        
        echo "Your $add MMK is draw."."<br>";
        parent::withdraw($add);
    }
 }

 class SavingAccount extends BankAccount {
    // $interest=0.03;
     public function annualInterest()
     {
        $interest=0.03;//line 53
        $annual_interest=($this->balance*$interest)*12;
        echo "1Yr in your interest is: $annual_interest"."<br>";
     }
     public function depositeMonthlyInterest()
     {
        $interest=0.03;
        $monthlyInterest=$this->balance*$interest/12;
        echo "1Month in your interest is :$monthlyInterest";
     }
 }

 $account1=new Checkingaccount("Maung",400000);
 echo $account1->insufficentFee(30000);
 echo $account1->ProcessCheck();
 echo $account1->withdraw(1000000);
 
 $savingAccount=new SavingAccount("Maung",400000);
 $savingAccount->annualInterest();
 $savingAccount->depositeMonthlyInterest();


?>