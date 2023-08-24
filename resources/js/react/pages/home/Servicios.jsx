import Cards from "../../components/utils/Cards";
import Container from "../../components/utils/Container";
import Titulo from "../../components/utils/Titulo";
import { FIGURA_MAYA, MEDICINA } from "../../icons/icons";

export default function Servicios() {
    return (
        <Container
            className="relative z-20"
            intoSection={
                <div className="bg-white absolute top-0 left-0 w-full h-[630px] z-10"></div>
            }
            classNameSection="bg-verde relative overflow-hidden z-[1]"
        >
            {/*//? Decoraciones left */}
            <div className="absolute top-[150px] -left-3">
                <figure className="mb-3">
                    <FIGURA_MAYA fill="#55cfa6" />
                </figure>
                <figure className="mb-3 rotate-90">
                    <FIGURA_MAYA fill="#55cfa6" />
                </figure>
                <figure className="mb-3">
                    <FIGURA_MAYA fill="#55cfa6" />
                </figure>
                <figure className="rotate-90">
                    <FIGURA_MAYA fill="#55cfa6" />
                </figure>
            </div>

            {/*//? Decoraciones right */}
            <div className="absolute top-[200px] -right-10">
                <figure className="mb-3 rotate-45">
                    <FIGURA_MAYA fill="#55cfa6" width="150px" />
                </figure>
            </div>

            <Titulo className="mb-8">CONSULTA NUESTROS SERVICIOS</Titulo>

            <p className="text-center mb-8">Aqui van las categorias</p>
            <div className="grid gap-4 pt-4 sm:grid-cols-[repeat(2,1fr)] md:grid-cols-[repeat(3,1fr)] lg:md:grid-cols-[repeat(4,1fr)] w-[95%] mx-auto">
                {[1, 2, 3, 4, 5, 6, 7, 8].map((s) => (
                    <Cards
                        key={"card-" + s}
                        title="Lorem ipsum"
                        description="Minim dolor sint magna fugiat duis cillum mollit qui ad do deserunt."
                        cover={
                            "https://images.pexels.com/photos/4033304/pexels-photo-4033304.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        }
                    />
                ))}
            </div>
        </Container>
    );
}
