<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipoRepository")
 */
class Equipo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoria;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexo;

    /**
     * @ORM\Column(type="integer")
     */
    private $numjugadores;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultado", mappedBy="equipolocal")
     */
    private $resultadoslocal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultado", mappedBy="equipovisitante")
     */
    private $resultadovisitante;

    public function __construct()
    {
        $this->resultadoslocal = new ArrayCollection();
        $this->resultadovisitante = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getNumjugadores(): ?int
    {
        return $this->numjugadores;
    }

    public function setNumjugadores(int $numjugadores): self
    {
        $this->numjugadores = $numjugadores;

        return $this;
    }

    /**
     * @return Collection|Resultado[]
     */
    public function getresultadoslocal(): Collection
    {
        return $this->resultadoslocal;
    }

    public function addResultado(Resultado $resultado): self
    {
        if (!$this->resultadoslocal->contains($resultado)) {
            $this->resultadoslocal[] = $resultado;
            $resultado->setEquipolocal($this);
        }

        return $this;
    }

    public function removeResultado(Resultado $resultado): self
    {
        if ($this->resultadoslocal->contains($resultado)) {
            $this->resultadoslocal->removeElement($resultado);
            // set the owning side to null (unless already changed)
            if ($resultado->getEquipolocal() === $this) {
                $resultado->setEquipolocal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Resultado[]
     */
    public function getResultadovisitante(): Collection
    {
        return $this->resultadovisitante;
    }

    public function addResultadovisitante(Resultado $resultadovisitante): self
    {
        if (!$this->resultadovisitante->contains($resultadovisitante)) {
            $this->resultadovisitante[] = $resultadovisitante;
            $resultadovisitante->setEquipovisitante($this);
        }

        return $this;
    }

    public function removeResultadovisitante(Resultado $resultadovisitante): self
    {
        if ($this->resultadovisitante->contains($resultadovisitante)) {
            $this->resultadovisitante->removeElement($resultadovisitante);
            // set the owning side to null (unless already changed)
            if ($resultadovisitante->getEquipovisitante() === $this) {
                $resultadovisitante->setEquipovisitante(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->categoria;
    }
}
