<?php
namespace app\models;

class TagsService
{
    private $tagsCount;

    public function ParseTags(string $filePath, Files $file)
    {
        $xml = simplexml_load_string(file_get_contents($filePath));

        $this->CountTags($xml);

        $this->SaveTagsCount($file);
    }

    private function CountTags(\SimpleXMLElement $root)
    {
        $this->IncrementTag($root->getName());

        /** @var \SimpleXMLElement $child */
        foreach ($root as $child) {
            if($child->count() !== 0) {
                $this->CountTags($child);
            } else {
                $this->IncrementTag($child->getName());
            }
        }
    }

     private function IncrementTag(string $tagName)
     {
         if (!isset($this->tagsCount[$tagName])) {
             $this->tagsCount[$tagName] = 1;
         } else {
             $this->tagsCount[$tagName]++;
         }
     }

    private function SaveTagsCount(Files $file)
    {
        foreach ($this->tagsCount as $tagName => $count) {
            $tag = new Tags();
            $tag->file_id = $file->id;
            $tag->name = $tagName;
            $tag->count = $count;

            $tag->save();
        }
    }
}
