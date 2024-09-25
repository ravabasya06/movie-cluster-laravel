import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
    faMagnifyingGlass,
    faPlay,
    faThumbsUp,
} from "@fortawesome/free-solid-svg-icons";

library.add(faMagnifyingGlass, faThumbsUp, faPlay);

export { FontAwesomeIcon };
