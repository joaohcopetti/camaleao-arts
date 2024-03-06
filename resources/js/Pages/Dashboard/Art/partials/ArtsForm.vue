<script setup lang="ts">
import { Art, Category } from '@/types'
import { useForm } from '@inertiajs/vue3'
import { computed } from 'vue'
import { onMounted } from 'vue'

type ArtsCreateForm = {
  name: string
  file?: File
  image?: File
  category?: Category
}

const props = defineProps<{
  art?: Art
  categories: object[]
}>()

const form = useForm<ArtsCreateForm>({
  name: '',
  file: undefined,
  image: undefined,
  category: undefined
})

const isEdit = computed(() => props.art)
const endpoint = computed(() =>
  isEdit.value
    ? route('dashboard.arts.update', { art: props.art!.slug })
    : route('dashboard.arts.store')
)

const onInputFile = (file: File | undefined, field: 'file' | 'image') => {
  form[field] = file
}

const populateForm = () => {
  if (!props.art) {
    return
  }

  form.name = props.art.name
  form.category = props.art.category
}

onMounted(() => {
  populateForm()
})
</script>

<template>
  <AppForm
    :form="form"
    :endpoint="endpoint"
    :method="isEdit ? 'patch' : 'post'"
  >
    <AppInput
      v-model="form.name"
      name="name"
      autofocus
      label="Nome"
      placeholder="Digite o nome da arte..."
      :error-message="form.errors.name"
    />
    <AppInputFile
      label="Arquivo da arte"
      name="file"
      :hint="['Tipos aceitos: .cdr', isEdit && 'Deixe em branco caso não queira alterar a arte']"
      :error-message="form.errors.file"
      accept=".cdr"
      @change="onInputFile($event, 'file')"
    />
    <AppInputFile
      label="Imagem da arte"
      name="image"
      :hint="[isEdit && 'Deixe em branco caso não queira alterar a arte']"
      :error-message="form.errors.image"
      accept=".png,.jpeg,.jpg"
      @change="onInputFile($event, 'image')"
    />
    <AppCombobox
      v-model="form.category"
      name="category"
      placeholder="Escolha uma categoria..."
      label="Categoria"
      :items="categories"
      filter-by="name"
      display-prop="name"
      :error-message="form.errors.category"
    >
      <template #option="item"> {{ item.name }} </template>
    </AppCombobox>

    <div class="mt-4">
      <AppButton
        type="submit"
        :loading="form.processing"
        class="btn-success btn-outline w-full"
        :label="isEdit ? 'Atualizar' : 'Cadastrar'"
      />
    </div>
  </AppForm>
</template>
