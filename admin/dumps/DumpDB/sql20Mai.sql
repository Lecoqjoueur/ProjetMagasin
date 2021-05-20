--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.20
-- Dumped by pg_dump version 13.0

-- Started on 2021-05-20 23:46:33

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 2207 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 199 (class 1255 OID 112983)
-- Name: is_admin(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_admin(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id id_admin from bp_admin where login = f_login and password= f_password;
	if not found
	then
		retour = 0;
	else
		retour =1;
	end if;
	return retour;
end;

';


--
-- TOC entry 200 (class 1255 OID 113107)
-- Name: is_client(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_client(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
    begin
	select into id id from client where username = f_login and mdp= f_password;
	if not found
	then
		retour = 0;
	else
		retour =1;
	end if;
	return retour;
end;

';


SET default_tablespace = '';

--
-- TOC entry 192 (class 1259 OID 112723)
-- Name: bp_admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.bp_admin (
    id_admin integer NOT NULL,
    login text,
    password text
);


--
-- TOC entry 191 (class 1259 OID 112721)
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.bp_admin_id_admin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2208 (class 0 OID 0)
-- Dependencies: 191
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.bp_admin_id_admin_seq OWNED BY public.bp_admin.id_admin;


--
-- TOC entry 194 (class 1259 OID 113018)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    id_cat integer NOT NULL,
    nom_cat text,
    image text
);


--
-- TOC entry 193 (class 1259 OID 113016)
-- Name: categorie_id_cat_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.categorie_id_cat_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2209 (class 0 OID 0)
-- Dependencies: 193
-- Name: categorie_id_cat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.categorie_id_cat_seq OWNED BY public.categorie.id_cat;


--
-- TOC entry 186 (class 1259 OID 112652)
-- Name: client; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client (
    id integer NOT NULL,
    username text NOT NULL,
    mdp text NOT NULL,
    adresse text NOT NULL,
    tel text NOT NULL,
    email text NOT NULL,
    cp integer NOT NULL
);


--
-- TOC entry 185 (class 1259 OID 112650)
-- Name: client_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.client_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2210 (class 0 OID 0)
-- Dependencies: 185
-- Name: client_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.client_id_seq OWNED BY public.client.id;


--
-- TOC entry 196 (class 1259 OID 113029)
-- Name: commande; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.commande (
    id_com integer NOT NULL,
    id_prod integer NOT NULL,
    quantite integer NOT NULL,
    username text NOT NULL
);


--
-- TOC entry 195 (class 1259 OID 113027)
-- Name: commande_id_com_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.commande_id_com_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2211 (class 0 OID 0)
-- Dependencies: 195
-- Name: commande_id_com_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.commande_id_com_seq OWNED BY public.commande.id_com;


--
-- TOC entry 189 (class 1259 OID 112665)
-- Name: produit; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.produit (
    id_prod integer NOT NULL,
    nom text NOT NULL,
    categorie text NOT NULL,
    description text,
    prix double precision NOT NULL,
    image text,
    reference text NOT NULL
);


--
-- TOC entry 187 (class 1259 OID 112661)
-- Name: produit_id_prod_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produit_id_prod_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2212 (class 0 OID 0)
-- Dependencies: 187
-- Name: produit_id_prod_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produit_id_prod_seq OWNED BY public.produit.id_prod;


--
-- TOC entry 188 (class 1259 OID 112663)
-- Name: produit_prix_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produit_prix_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2213 (class 0 OID 0)
-- Dependencies: 188
-- Name: produit_prix_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produit_prix_seq OWNED BY public.produit.prix;


--
-- TOC entry 198 (class 1259 OID 114093)
-- Name: vue_commande; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_commande AS
 SELECT commande.id_com,
    commande.quantite AS "quantité",
    commande.username,
    produit.id_prod,
    produit.nom,
    produit.categorie,
    produit.description,
    produit.prix,
    produit.image
   FROM public.produit,
    public.commande
  WHERE (commande.id_prod = produit.id_prod);


--
-- TOC entry 197 (class 1259 OID 113054)
-- Name: vue_produit; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_produit AS
 SELECT produit.id_prod,
    produit.nom,
    produit.categorie,
    produit.description,
    produit.prix,
    produit.image
   FROM public.produit;


--
-- TOC entry 190 (class 1259 OID 112683)
-- Name: vue_produits; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_produits AS
 SELECT produit.id_prod,
    produit.nom,
    produit.categorie,
    produit.description,
    produit.prix
   FROM public.produit;


--
-- TOC entry 2053 (class 2604 OID 112726)
-- Name: bp_admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin ALTER COLUMN id_admin SET DEFAULT nextval('public.bp_admin_id_admin_seq'::regclass);


--
-- TOC entry 2054 (class 2604 OID 113021)
-- Name: categorie id_cat; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id_cat SET DEFAULT nextval('public.categorie_id_cat_seq'::regclass);


--
-- TOC entry 2050 (class 2604 OID 112655)
-- Name: client id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client ALTER COLUMN id SET DEFAULT nextval('public.client_id_seq'::regclass);


--
-- TOC entry 2055 (class 2604 OID 113032)
-- Name: commande id_com; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande ALTER COLUMN id_com SET DEFAULT nextval('public.commande_id_com_seq'::regclass);


--
-- TOC entry 2051 (class 2604 OID 112668)
-- Name: produit id_prod; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit ALTER COLUMN id_prod SET DEFAULT nextval('public.produit_id_prod_seq'::regclass);


--
-- TOC entry 2052 (class 2604 OID 112675)
-- Name: produit prix; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit ALTER COLUMN prix SET DEFAULT nextval('public.produit_prix_seq'::regclass);


--
-- TOC entry 2197 (class 0 OID 112723)
-- Dependencies: 192
-- Data for Name: bp_admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.bp_admin (id_admin, login, password) VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3');


--
-- TOC entry 2199 (class 0 OID 113018)
-- Dependencies: 194
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorie (id_cat, nom_cat, image) VALUES (1, 'Console', 'console.png');
INSERT INTO public.categorie (id_cat, nom_cat, image) VALUES (2, 'PC', 'pc.jpg');
INSERT INTO public.categorie (id_cat, nom_cat, image) VALUES (3, 'Smartphone', 'tel.png');


--
-- TOC entry 2192 (class 0 OID 112652)
-- Dependencies: 186
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (1, 'Corentin', '1234', 'ville', '0699845066', 'user@hotmail.com', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (2, 'test', 'test', 'ville', '069/00/00', '@mail', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (3, 'Lecoq', '12345', 'Clos edmond leclercq 25', '0495619532', 'dehaene.coco@condorcet.be', 7548);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (5, 'AWQ', '12345', '23 rue du test', '1', '1', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (7, 'dehaene', '12', '1', '1', '1', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (8, 'cd', 'cd', '1', '1', '1', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (9, 'techno', 'shop', '1', '1', '1', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (10, 'test2', '123', 'A', '123456789', 'test2@email', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (12, 'cdw', 'wqw', '23', '1', '1', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (13, 'TEst23', '1213', '1', '1', '1', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (14, 'test123', '123', '1', '1', '1', 1);
INSERT INTO public.client (id, username, mdp, adresse, tel, email, cp) VALUES (15, 'sylvie', '1234', 'rue test 24', '01234567', 'test@email', 123);


--
-- TOC entry 2201 (class 0 OID 113029)
-- Dependencies: 196
-- Data for Name: commande; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (72, 15, 2, 'Corentin');
INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (73, 202, 1, 'techno');
INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (74, 303, 2, 'techno');
INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (75, 27, 2, 'test');
INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (76, 202, 1, 'Corentin');
INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (78, 102, 1, 'test123');
INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (80, 301, 2, 'sylvie');
INSERT INTO public.commande (id_com, id_prod, quantite, username) VALUES (81, 15, 2, 'sylvie');


--
-- TOC entry 2195 (class 0 OID 112665)
-- Dependencies: 189
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (102, 'Lenovo Legion', 'pc', 'Core i5 2,5 GHz - SSD 240 Go + HDD 1 To - 8 Go - NVIDIA GeForce GTX 1050 QWERTZ', 1499.99000000000001, 'lenovo.jpg', 'A2');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (203, 'XBOX Series X', 'console', 'Console Microsoft sortie en 2020', 499.990000000000009, 'XSX.png', 'B2');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (103, 'Asus', 'pc', 'Core i5 2,3 GHz - SSD 128 Go + HDD 1 To - 8 Go - NVIDIA GeForce GTX 1050 Ti AZERTY ', 999.990000000000009, 'asus.jpg', 'A3');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (302, 'Galaxy S9', 'smartphone', 'Samsung Galaxy S9 64 Go Dual Sim - Noir Carbone', 599.990000000000009, 'G9.jpg', 'C2');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (11, 'Acer Predator Orion', 'pc', 'carte vidéo NVIDIA GeForce RTX 3070, avec un processeur Intel Core i7 et 16 Go de RAM', 2290, 'placeholder.png', 'A5');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (303, 'Huawei P20', 'smartphone', 'Huawei P20 128 Go - Noir Carbone', 749.990000000000009, 'p20.jpg', 'C3');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (201, 'PS5', 'console', 'Console Sony sortie en Decembre 2020', 499.990000000000009, 'ps5.png', 'B3');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (101, 'Acer Nitro', 'pc', 'Core i5 2,4 GHz - SSD 128 Go   HDD 1 To - 8 Go - NVIDIA GeForce GTX 1080 AZERTY', 995.950000000000045, 'axer.jpg', 'A1');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (202, 'SWITCH', 'console', 'La console de Nintendo sortie en 2017', 299.990000000000009, 'switch.png', 'B1');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (301, 'Iphone 12S', 'smartphone', 'Apple Iphone 12S 5g 128 Gb Black', 949.990000000000009, 'I12.png', 'C1');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (27, 'Xbox ONE', 'console', 'Console Microsoft 7e Gen sortie en 2005', 34.990000000000002, 'placeholder.png', 'B6');
INSERT INTO public.produit (id_prod, nom, categorie, description, prix, image, reference) VALUES (15, 'PS2', 'console', 'Console Sony 6e Gen', 21.9899999999999984, 'ps2.jpg', 'B4');


--
-- TOC entry 2214 (class 0 OID 0)
-- Dependencies: 191
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.bp_admin_id_admin_seq', 1, true);


--
-- TOC entry 2215 (class 0 OID 0)
-- Dependencies: 193
-- Name: categorie_id_cat_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categorie_id_cat_seq', 1, true);


--
-- TOC entry 2216 (class 0 OID 0)
-- Dependencies: 185
-- Name: client_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.client_id_seq', 15, true);


--
-- TOC entry 2217 (class 0 OID 0)
-- Dependencies: 195
-- Name: commande_id_com_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.commande_id_com_seq', 81, true);


--
-- TOC entry 2218 (class 0 OID 0)
-- Dependencies: 187
-- Name: produit_id_prod_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produit_id_prod_seq', 28, true);


--
-- TOC entry 2219 (class 0 OID 0)
-- Dependencies: 188
-- Name: produit_prix_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produit_prix_seq', 1, false);


--
-- TOC entry 2065 (class 2606 OID 112731)
-- Name: bp_admin bp_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin
    ADD CONSTRAINT bp_admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 2067 (class 2606 OID 113026)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id_cat);


--
-- TOC entry 2057 (class 2606 OID 112660)
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id);


--
-- TOC entry 2069 (class 2606 OID 113034)
-- Name: commande commande_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT commande_pkey PRIMARY KEY (id_com);


--
-- TOC entry 2061 (class 2606 OID 114099)
-- Name: produit nom_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT nom_unique UNIQUE (nom);


--
-- TOC entry 2063 (class 2606 OID 112674)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id_prod);


--
-- TOC entry 2059 (class 2606 OID 113856)
-- Name: client username; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT username UNIQUE (username);


--
-- TOC entry 2070 (class 2606 OID 113046)
-- Name: commande produit_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT produit_fkey FOREIGN KEY (id_prod) REFERENCES public.produit(id_prod) NOT VALID;


-- Completed on 2021-05-20 23:46:37

--
-- PostgreSQL database dump complete
--

