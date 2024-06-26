<?php

namespace DevFighters\Symfony\Database;

use DevFighters\DateTime\DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\MappedSuperclass]
abstract class EntityTimed extends Entity {

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    protected ?DateTime $ins_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    protected ?DateTime $upd_at = null;

    public function getInsAt(): ?DateTime{
        return $this->ins_at;
    }
    public function setInsAt(DateTime $ins_at): static {
        $this->ins_at = $ins_at;
        return $this;
    }

    public function getUpdAt(): ?DateTime{
        return $this->upd_at;
    }
    public function setUpdAt(DateTime $upd_at): static{
        $this->upd_at = $upd_at;
        return $this;
    }

    public function eraseDatabaseTime():static{
        $this->ins_at = null;
        $this->upd_at = null;
        return $this;
    }

    /* ===== DATABASE ===== */

    #[ORM\PrePersist]
    public function prePersist():void{
        $this
            ->setInsAt(new DateTime())
            ->setUpdAt(new DateTime());
    }

    #[ORM\PreUpdate]
    public function preUpdate():void{
        $this->setUpdAt(new DateTime());
    }

    public function persist(bool $flush = false):static{
        return $this->save($flush);
    }
    public function save(bool $flush = false):static{
        if(is_null($this->getInsAt())) Database::persist($this);
        if($flush) Database::flush();
        return $this;
    }

}