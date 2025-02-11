create table public.questions (
);

create table public.suggestions (
  foreign key ("8") references public.users (id)
  match simple on update cascade on delete cascade
);

create table public.user_details (
);

create table public.user_stats (
);

create table public.user_suggestions (
  foreign key ("2") references public.suggestions (id)
  match simple on update cascade on delete cascade,
  foreign key ("1") references public.users (id)
  match simple on update cascade on delete cascade
);

create table public.users (
  foreign key ("6") references public.user_details (id)
  match simple on update no action on delete no action,
  foreign key ("7") references public.user_stats (id)
  match simple on update no action on delete no action
);
create unique index users_pk_2 on users using btree ("4");
create unique index users_pk on users using btree ("4");

insert into public.questions (id, contents, option_a, option_b, option_c, option_d, date, image, correct)
values  (1, 'What is it?', 'Star Wars', 'Wars', 'War', 'Star', '2025-02-11', 'public/img/Star_Wars_Logo.png', 1);

insert into public.suggestions (id, title, description, like, dislike, created_at, id_suggested_by, image)
values  (28, 'Test 3', 'e', 0, 0, '2025-02-11', 16, 'International_Pokémon_logo.svg.png'),
        (29, 'Test 4', 'testsdsfds', 0, 0, '2025-02-11', 16, 'Star_Wars_Logo.png');

insert into public.user_details (id, name, surname)
values  (13, 'e', 'e'),
        (14, 'e', 'e'),
        (15, 'e', 'e');

insert into public.user_stats (id, wins, losses, last_answered)
values  (1, 0, 0, '2025-02-10'),
        (3, 0, 0, '2025-02-10'),
        (2, 3, 2, '2025-02-11');

insert into public.user_suggestions (id_user, id_suggestion)
values  (16, 28),
        (16, 29);

insert into public.users (id, email, password, id_user_details, id_user_stats)
values  (16, 'e@e.com', 'e', 14, 2),
        (17, 'elendoin23@gmail.com', 'e', 15, 3);