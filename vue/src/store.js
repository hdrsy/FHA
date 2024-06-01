import {defineStore} from "pinia"
export const useAppStore = defineStore('app', {
  state: () => ({
    loading: false
  }),
  actions: {
    showLoading() {
      this.loading = true
    },
    hideLoading() {
      this.loading = false
    }
  }
})
