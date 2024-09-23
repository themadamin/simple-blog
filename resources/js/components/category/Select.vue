<template>
    <div class="row mb-4 pb-2">
        <p>Select any level of options (Single selection)</p>
        <el-cascader :options="addLabel(categories)" :props="config" @change="onSelect" />
    </div>
</template>
<script>
export default {
    data() {
        return {
            config: {
                checkStrictly: true,
            },
        }
    },
    methods: {
        addLabel(arr) {
            arr.map(category => {
                category.label = category.name;
                category.value = category.id;
                if (category.children.length > 0) this.addLabel(category.children);
                return category;
            })

            return arr;
        },
        onSelect(e) {
            const lastEl = e[e.length - 1];
            this.$emit('onSelect', lastEl)
        },
    },
    props: {
        categories: {
            type: Array,
            required: true
        }
    }
}
</script>
