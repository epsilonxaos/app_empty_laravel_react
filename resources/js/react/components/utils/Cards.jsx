import { Link } from "react-router-dom";
import "../../../../css/web/_cards.css";
import Button from "./Button";

export default function Cards({
    title = "",
    description = "",
    cover = "",
    to = "/",
}) {
    return (
        <div class="card shadow rounded group">
            <div
                className="bg-cover group-hover:blur-sm"
                style={{ backgroundImage: 'url("' + cover + '")' }}
            ></div>
            <div class="content">
                <h2 class="text-black text-lg font-bold">{title}</h2>
                <p class="text-black text-sm">{description}</p>
                <Link to={to}>
                    <Button>Más información</Button>
                </Link>
            </div>
        </div>
    );
}
