{foreach $inventions as $invention nocache}
    <div>
        <p><strong>{$invention->getName()}</strong> ({$invention->getYear()})</p>
        {$invention->getShort_description()}
        <p><a href="{createUri controller='inventions' action='index' params=[$invention->getId()]}">Viac informácií</a></p>
    </div>
{foreachelse}
    <p>Nenašli sa žiadne objavy fyzikov žijúcich v roku {$year}.</p>
{/foreach}