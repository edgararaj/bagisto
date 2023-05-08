<template>
    <nav :class="`${addClass ? addClass : ''}`" v-if="slicedCategories && slicedCategories.length > 0">
        <button style="width: 100%" class="btn theme-btn">Categorias</button>
        <ul class="border" type="none" style="margin-bottom: 0">
            <li :key="categoryIndex" :id="`category-${category.id}`" class="category-content cursor-pointer"
                v-for="(category, categoryIndex) in slicedCategories">
                <a :href="`${$root.baseUrl}/${category.slug}`" :class="`category unset ${category.children.length > 0 ? 'fw6' : ''
                    }`">
                    <div class="category-icon">
                        <img v-if="category.category_icon_url" :src="category.category_icon_url" height="100%" />
                    </div>
                    <span class="category-title">{{ category['name'] }}</span>

                    <i class="rango-arrow-right pr15 float-right" v-if="
                        category.children.length &&
                        category.children.length > 0
                    ">
                    </i>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script type="text/javascript">
export default {
    props: ['id', 'addClass', 'parentSlug', 'mainSidebar', 'categoryCount'],

    data: function () {
        return {
            slicedCategories: [],
            sidebarLevel: Math.floor(Math.random() * 1000),
        };
    },

    watch: {
        '$root.sharedRootCategories': function (categories) {
            this.formatCategories(categories);
        },
    },

    methods: {
        remainBar: function (id) {
            let sidebar = $(`#${id}`);

            if (sidebar && sidebar.length > 0) {
                sidebar.show();

                let actualId = id.replace('sidebar-level-', '');

                let sidebarContainer = sidebar.closest(
                    `.sub-category-${actualId}`
                );

                if (sidebarContainer && sidebarContainer.length > 0) {
                    sidebarContainer.show();
                }
            }
        },

        formatCategories: function (categories) {
            let slicedCategories = categories;
            let categoryCount = this.categoryCount ? this.categoryCount : 9;

            if (slicedCategories && slicedCategories.length > categoryCount) {
                slicedCategories = categories.slice(0, categoryCount);
            }

            if (this.parentSlug) {
                slicedCategories['parentSlug'] = this.parentSlug;
            }

            this.slicedCategories = slicedCategories;
        },
    },
};
</script>
