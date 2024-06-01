
import { useAppStore } from "@/store";
import axios from "axios";

export function url(str) {
  return `${import.meta.env.VITE_API_URL}${str}`
}


export const fetch = async (url, callback) => {
  const store = useAppStore();
  try {
    store.showLoading();
    let response = await axios.get(url);
    callback(response.data); // return data using callback as argument
    store.hideLoading();
  } catch (error) {
    console.error(
      "There was an error fetching data:",
      error,
    );
  }
}
