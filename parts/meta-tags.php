<?php the_tags('<nav class="taxonomy taxonomy-tags">
	<div class="taxonomy_label">'.__('Tags','nc-framework').'</div>
	<div class="taxonomy_anchors">','','</div>
</nav>'); ?>

<style>

	/* Taxonomy (Tags and Categories) */

.taxonomy {
  position: relative;
  margin-top:3rem;
  margin-bottom:var(--gap);
}

.taxonomy + .taxonomy {
  margin-top:var(--gap);
  margin-bottom:3rem;
}

.taxonomy_label {
  font-weight: normal;
  font-size: 0.7em;
  text-transform: uppercase;
  margin-bottom:0.5rem;
}

.taxonomy-tags .taxonomy_anchors,
.taxonomy-categories .taxonomy_anchors ul {
  display: grid;
  grid-gap:0.5rem;
  grid-template-columns:repeat(auto-fill, minmax(100px, 1fr));
  width: 100%;
}

.ncontent_main .taxonomy_anchors a {
  font-size: 0.7em;
  color: currentColor !important;
  text-decoration: none !important;
  padding: 0.75em;
  background-color: var(--gray);
  border-radius: 0;
  white-space: nowrap;
  overflow:hidden;
  text-overflow:ellipsis;
  text-transform:lowercase;
  transition:0.3s;
}

.taxonomy_anchors a:hover {
  background-color: lightyellow;
}


/* for WordPress Categories: they print things out in lists */

.taxonomy_anchors ul,
.taxonomy_anchors li {
  list-style-type: none;
  padding: 0;
  margin: 0 !important;
}

.taxonomy_anchors li a {
  display: block;

}

</style>