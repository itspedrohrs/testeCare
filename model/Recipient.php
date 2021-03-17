<?php

class Recipient extends Connection
{
    private $id;
    private $name;
    private $cpf_cnpj;
    private $place;
    private $number;
    private $district;
    private $county;
    private $idCounty;
    private $state;
    private $zipCode;
    private $country;
    private $email;
    private $numberRecipient;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCpfCnpj()
    {
        return $this->cpf_cnpj;
    }

    /**
     * @param mixed $cpf_cnpj
     */
    public function setCpfCnpj($cpf_cnpj): void
    {
        $this->cpf_cnpj = $cpf_cnpj;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place): void
    {
        $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district): void
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param mixed $county
     */
    public function setCounty($county): void
    {
        $this->county = $county;
    }

    /**
     * @return mixed
     */
    public function getIdCounty()
    {
        return $this->idCounty;
    }

    /**
     * @param mixed $idCounty
     */
    public function setIdCounty($idCounty): void
    {
        $this->idCounty = $idCounty;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNumberRecipient()
    {
        return $this->numberRecipient;
    }

    /**
     * @param mixed $numberRecipient
     */
    public function setNumberRecipient($numberRecipient): void
    {
        $this->numberRecipient = $numberRecipient;
    }

    public function save(Recipient $recipient)
    {

        try {
            $sql = "INSERT INTO recipient (id,
              name,cpf_cnpj,place,number,district,county,idCounty,state,zipCode,
                     country,email,numberRecipient,date_created)
              VALUES (:id,
              :name,:cpf_cnpj,:place,:number,:district,:county,:idCounty,:state,:zipCode,
              :country,:email,:numberRecipient,:date_created)";

            $insert = Connection::getInstance()->prepare($sql);
            $insert->bindValue(":id", 0);
            $insert->bindValue(":name", $recipient->getName());
            $insert->bindValue(":cpf_cnpj", $recipient->getCpfCnpj());
            $insert->bindValue(":place", $recipient->getPlace());
            $insert->bindValue(":number", $recipient->getNumber());
            $insert->bindValue(":district", $recipient->getDistrict());
            $insert->bindValue(":county", $recipient->getCounty());
            $insert->bindValue(":idCounty", $recipient->getIdCounty());
            $insert->bindValue(":state", $recipient->getState());
            $insert->bindValue(":zipCode", $recipient->getZipCode());
            $insert->bindValue(":country", $recipient->getCountry());
            $insert->bindValue(":email", $recipient->getEmail());
            $insert->bindValue(":numberRecipient", $recipient->getNumberRecipient());
            $insert->bindValue(":date_created", date('Y.m.d H:i:s'));

            $insert->execute();

            return $this->idNext();
        } catch (Exception $e) {
            print "Erro ao cadastrar a nota ! " . $e->getMessage();
        }
    }

    public function idNext()
    {
        try {
            $sql = "SELECT Auto_increment FROM information_schema.tables
            WHERE table_name='recipient'";
            $result = Connection::getInstance()->query($sql);
            $id = $result->fetch(PDO::FETCH_ASSOC);

            return $id['Auto_increment'] - 1;

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação,
          foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}