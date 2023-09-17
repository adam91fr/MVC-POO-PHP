<?php
namespace App\Models;

use App\Core\Db;

class Model extends Db{
    protected $table;
    private $db;

    public function findAll(){
        $query=$this->requete('SELECT * FROM '.$this->table);
        return $query->fetchAll();
    }

    public function findBy(array $criteres){
        $champs=[];
        $valeurs =[];

        foreach($criteres as $champ => $valeur){
            $champs[]="$champ = ?";
            $valeurs[]=$valeur;
        }
        //var_dump($valeurs);

        $liste_champs = implode(' AND ', $champs);
        //var_dump($liste_champs);

        $sql='SELECT * FROM '.$this->table.' WHERE '.$liste_champs;
        //var_dump($sql);        
        
        $query=$this->requete($sql,$valeurs);
        //$query=$this->requete('SELECT * FROM '.$this->table.' WHERE '.$liste_champs);

        return $query->fetchAll();
    }

    public function find(int $id){
        return $this->requete("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }

    public function create(Model $model){
        $champs=[];
        $inter=[];
        $valeurs =[];

        foreach($model as $champ => $valeur){
            if($valeur!==null && $champ!='db' && $champ!= 'table'){
                $champs[]=$champ;
                $inter[]="?";
                $valeurs[]=$valeur;
            }
        }
        
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);
        

        $sql= 'INSERT INTO '.$this->table.' ( '.$liste_champs.') VALUES ( '.$liste_inter.' )';

        return $this->requete($sql, $valeurs)->fetchAll();

    }

    public function update(int $id, Model $model){
        $champs=[];
        $valeurs =[];

        foreach($model as $champ => $valeur){
            if($valeur!==null && $champ!='db' && $champ!= 'table'){
                $champs[]="$champ  = ?";
                $valeurs[]=$valeur;
            }
        }
        $valeurs[]=$id;

        $liste_champs = implode(', ', $champs);

        $sql= 'UPDATE '.$this->table.' SET '.$liste_champs.' WHERE id = ?';

        echo $sql;

        return $this->requete($sql, $valeurs)->fetchAll();

    }

    public function delete(int $id){
       
        $sql= 'DELETE FROM '.$this->table.' WHERE id = ?';

        echo $sql;

        return $this->requete($sql, [$id]);

    }

    protected function requete(string $sql, array $attributs = null){
        $this->db=Db::getInstance();

        if($attributs!==null){
            $query=$this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else{
            return $this->db->query($sql);
        }
    }

    public function hydrate(array $donnees){
        var_dump($donnees);
        foreach($donnees as $key => $value){
            $setter='set'.ucfirst($key);
            
            if(method_exists($this, $setter)){
                
                $this->$setter($value);
            }
        }
        return $this;
    }
}
?>