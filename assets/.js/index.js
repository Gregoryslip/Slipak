import ModalContentWindow from "./components/ModalWindow/ModalContentWindow";

import ModalWindow from "./components/ModalWindow/ModalWindow";

import ModalVideoWindow from "./components/ModalWindow/ModalVideoWindow";

import { header } from "./components/header";

import { lazyLoad } from "./components/lazyLoad";

import { utils } from "./components/utils";

import { select } from "./components/select";

import { pricing } from "./components/pricing";

import { tabs } from "./components/tabs";

import { customerSlider } from "./components/customerSlider";

import {initBlog} from "./components/blog";

import { findMore } from "./components/findMore";

import { formLoadFile } from "./components/formloadfile";



export function runAfterDomLoad() {

    lazyLoad()

    utils()

    header()

    new ModalWindow(ModalVideoWindow, ModalContentWindow)

    select()

    pricing()

    tabs()

    customerSlider()

    initBlog()

    findMore()

    formLoadFile()

}

