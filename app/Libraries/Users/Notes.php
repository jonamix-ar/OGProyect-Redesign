<?php

namespace App\Libraries\Users;

use App\Core\Entity\NotesEntity;

class Notes
{
    private array $notes = [];
    private int $notes_count = 0;

    public function __construct($notes)
    {
        if (is_array($notes)) {
            $this->setUp($notes);
        }
    }

    /**
     * Get all the notes
     *
     * @return array
     */
    public function getNotes(): array
    {
        $list_of_notes = [];

        foreach ($this->notes as $notes) {
            if (($notes instanceof NotesEntity)) {
                $list_of_notes[] = $notes;
            }
        }

        return $list_of_notes;
    }

    /**
     * Get note by ID
     *
     * @param int $note_id
     *
     * @return array
     */
    public function getNoteById(int $note_id)
    {
        if ($note_id == $this->getNotes()[0]->getNoteId()) {
            return $this->getNotes()[0];
        }

        return null;
    }

    /**
     * Set up the list of notes
     *
     * @param array $notes Notes
     *
     * @return void
     */
    private function setUp($notes): void
    {
        foreach ($notes as $note) {
            $this->notes[] = $this->createNewNotesEntity($note);

            $this->setNotesCount();
        }
    }

    /**
     * Count the amount of notes
     *
     * @return boolean
     */
    public function hasNotes(): bool
    {
        return ($this->getNotesCount() > 0);
    }

    /**
     * Set the notes count
     *
     * @return void
     */
    private function setNotesCount(): void
    {
        ++$this->notes_count;
    }

    /**
     * Return the notes count
     *
     * @return int
     */
    public function getNotesCount(): int
    {
        return $this->notes_count;
    }

    /**
     * Create a new instance of NotesEntity
     *
     * @param array $note Note
     *
     * @return \NotesEntity
     */
    private function createNewNotesEntity($note): NotesEntity
    {
        return new NotesEntity($note);
    }
}
